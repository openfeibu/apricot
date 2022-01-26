<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use Tree;
use App\Models\Plant;
use App\Repositories\Eloquent\PlantRepositoryInterface;
use App\Repositories\Eloquent\CatalogRepositoryInterface;

/**
 * Resource controller class for page.
 */
class PlantResourceController extends BaseController
{
    /**
     * Initialize category resource controller.
     *
     * @param type PlantRepositoryInterface $plant
     * @param type CatalogRepositoryInterface $catalog_repository
     */
    public function __construct(PlantRepositoryInterface $plant,CatalogRepositoryInterface $catalog_repository)
    {
        parent::__construct();
        $this->repository = $plant;
        $this->catalog_repository = $catalog_repository;
        $this->slug_name = '';
        $this->slug = '';
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $pants = $this->repository
                ->where(['slug' => 'specimen'])
                ->orderBy('id','desc')
                ->paginate($limit);
            $data = $pants ? $pants->toArray()['data'] : [];
            return $this->response
                ->success()
                ->count($pants->total())
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('plant.index')
			->data(['slug' => $this->slug])
            ->output();
    }
    public function create(Request $request)
    {
        $plant = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('plant.create')
            ->data([
                'title' => $this->slug_name,
                'plant' => $plant,
                'slug' => $this->slug
            ])
            ->output();
    }
    public function show(Request $request,Plant $plant)
    {
        $catalogs = [];
        if ($plant) {
            $catalogs = $this->catalog_repository->getCatalogTree($plant['id']);
            $view = 'plant.show';
        } else {
            $plant = $this->repository->newInstance([]);
            $view = 'plant.create';
        }
        return $this->response->title(trans('app.view'))
            ->data([
                'title' => $this->slug_name,
                'plant' => $plant,
                'catalogs' => $catalogs,
                'slug' => $this->slug
            ])
            ->view($view)
            ->output();
    }
    public function getPlantBySlugView()
    {
        $plant = $this->repository->getPlantBySlug($this->slug);
        $catalogs = [];
        if ($plant) {
            //$view = $slug.'.show';
            $catalogs = $this->catalog_repository->getCatalogTree($plant['id']);
            $view = 'plant.show';
        } else {
            //$view = $slug.'.create';
            $plant = $this->repository->newInstance([]);
            $view = 'plant.create';
        }

        return $this->response->title(trans('app.view'))
            ->data([
                'title' => $this->slug_name,
                'plant' => $plant,
                'catalogs' => $catalogs,
                'slug' => $this->slug
            ])
            ->view($view)
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();
            $attributes['slug'] = $this->slug ;
            $plant = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created',['Module' =>$this->slug_name]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->slug.'/'.$plant->id))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->slug))
                ->redirect();
        }
    }
    public function update(Request $request,Plant $plant)
    {
        try {
            $attributes = $request->all();
            $plant->update($attributes);

            return $this->response->message(trans('messages.success.updated',['Module' =>$this->slug_name]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->slug.'/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->slug.'/' ))
                ->redirect();
        }
    }
    public function createCatalog(Request $request)
    {
        $parent_id = $request->input('parent_id',0);
        $parent_catalog = [];
        if($parent_id)
        {
            $parent_catalog = $this->catalog_repository->find($parent_id);
        }
        return $this->response->layout('render')
            ->view('plant.catalog.create')
            ->data([
                'parent_id' => $parent_id,
                'parent_catalog' => $parent_catalog,
            ])
            ->output();
    }
    public function storeCatalog(Request $request)
    {
        try {
            $attributes = $request->all();
            $plant = $this->repository->getPlantBySlug($this->slug);
            $attributes['plant_id'] = $plant['id'];

            $this->catalog_repository->create($attributes);

            return $this->response->message(trans('messages.success.created'))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->slug))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->slug))
                ->redirect();
        }
    }
    public function showCatalog(Request $request)
    {
        $id = $request->input('id');
        $catalog = $this->catalog_repository->find($id);
        $parent_catalog = [];
        if($catalog['parent_id'])
        {
            $parent_catalog =  $this->catalog_repository->find($catalog['parent_id']);
        }
        $plant = $this->repository->getPlantBySlug($this->slug);
        $top_catalogs = $this->catalog_repository->getTops($plant['id']);
        return $this->response->layout('render')
            ->view('plant.catalog.show')
            ->data([
                'catalog' => $catalog,
                'top_catalogs' => $top_catalogs,
                'parent_catalog' => $parent_catalog,
            ])
            ->output();
    }
    public function updateCatalog(Request $request,$id)
    {
        try{
            $attributes = $request->all();

            $catalog = $this->catalog_repository->find($id);

            $catalog->update($attributes);

            return $this->response->message(trans('messages.success.created'))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->slug))
                ->redirect();

        } catch (Exception $e)
        {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->slug))
                ->redirect();
        }
    }
    public function destroyCatalog($id)
    {
        try {
            $catalog = $this->catalog_repository->find($id);
            $child_catalog_ids = $this->catalog_repository->where(['parent_id' => $catalog['id']])->pluck('id')->toArray();

            $catalog->forceDelete();
            if($child_catalog_ids)
            {
                $this->catalog_repository->delete($child_catalog_ids);
            }

            return $this->response->message(trans('messages.success.deleted'))
                ->status("success")
                ->code(202)
                ->url(guard_url($this->slug))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url($this->slug))
                ->redirect();
        }
    }
}