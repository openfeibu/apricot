<?php

namespace App\Http\Controllers\Pc;

use Illuminate\Http\Request;
use Route,Auth;
use App\Http\Controllers\Pc\Controller as BaseController;
use App\Repositories\Eloquent\PlantRepositoryInterface;
use App\Repositories\Eloquent\CatalogRepositoryInterface;

class SpecimenController extends BaseController
{
    public function __construct(PlantRepositoryInterface $plant_repository,CatalogRepositoryInterface $catalog_repository)
    {
        parent::__construct();
        $this->plant_repository = $plant_repository;
        $this->catalog_repository = $catalog_repository;
        $this->slug = 'specimen';
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_name = $request->input('name');
        $plants = $this->plant_repository
            ->where(['slug' => $this->slug]);
        if($search_name)
        {
            $plants = $plants->where(['name' => ['name','like' , '%'.$search_name.'%']]);
        }
        $plants = $plants
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->paginate(10);

        $plants = $plants->toArray()['data'];
        foreach ($plants as $key => $plant)
        {
            $size_info = GetImageSize(url("/image/original".$plant['image']));
            $plant['width'] = $size_info[0];
            $plant['height'] = 252/$plant['width'] * $size_info[1] ;
            $plant['width'] = 252;
            $plant['image'] = url("/image/original".$plant['image']);
            $plant['popularity'] = drop_blank(cut_html_str(strip_tags($plant['content']),50));
            $plants[$key] = $plant;

        }

        if ($this->response->typeIs('json')) {
            return $this->response
                ->success()
                ->data($plants)
                ->output();
        }

        return $this->response->title('标本鉴赏')
            ->view('plant.index')
            ->data(compact('plants','search_name'))
            ->output();
    }
    public function show(Request $request,$id)
    {

        $plant = $this->plant_repository->find($id);
        $catalogs = $this->catalog_repository->getCatalogTree($plant['id']);

        $plant->increment('views_count');

        return $this->response->title($plant->name)
            ->view('plant.show')
            ->data([
                'plant' => $plant,
                'catalogs' => $catalogs,
            ])
            ->output();
    }
}
