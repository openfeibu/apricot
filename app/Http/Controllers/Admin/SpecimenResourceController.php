<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\PlantResourceController as BaseController;
use App\Models\Catalog;
use Illuminate\Http\Request;
use PHPUnit\Runner\Exception;
use Tree;
use App\Models\Plant;
use App\Repositories\Eloquent\PlantRepositoryInterface;
use App\Repositories\Eloquent\CatalogRepositoryInterface;
/**
 * Resource controller class for page.
 */
class SpecimenResourceController extends BaseController
{
    /**
     *
     * @param type PlantRepositoryInterface $plant
     * @param type CatalogRepositoryInterface $catalog_repository
     *
     */
    public function __construct(PlantRepositoryInterface $plant,CatalogRepositoryInterface $catalog_repository)
    {
        parent::__construct($plant,$catalog_repository);
        $this->repository = $plant;
        $this->catalog_repository = $catalog_repository;
        $this->slug = 'specimen';
        $this->slug_name = trans('specimen.name');
    }
    public function index(Request $request)
    {
        return parent::index($request);
    }
    public function show(Request $request,Plant $speciman)
    {
        return parent::show($request,$speciman);
    }
    public function store(Request $request)
    {
        return parent::store($request);
    }
    public function update(Request $request,Plant $speciman)
    {
        return parent::update($request,$speciman);
    }
    public function createCatalog(Request $request)
    {
        return parent::createCatalog($request);
    }
    public function storeCatalog(Request $request)
    {
        return parent::storeCatalog($request);
    }
    public function showCatalog(Request $request)
    {
        return parent::showCatalog($request);
    }
    public function updateCatalog(Request $request,$id)
    {
        return parent::updateCatalog($request,$id);
    }
    public function destroyCatalog($id)
    {
        return parent::destroyCatalog($id);
    }

    public function destroy(Request $request,Plant $speciman)
    {
        try {
            $this->repository->forceDelete([$speciman->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('specimen.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('specimen'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('specimen'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('specimen.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('specimen'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('specimen'))
                ->redirect();
        }
    }
}