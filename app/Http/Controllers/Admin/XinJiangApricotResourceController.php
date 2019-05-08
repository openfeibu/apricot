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
class XinJiangApricotResourceController extends BaseController
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
        $this->slug = 'XinJiang_apricot';
        $this->slug_name = '新疆杏';
    }
    public function index(Request $request)
    {
        return parent::getPlantBySlugView();
    }
    public function store(Request $request)
    {
        return parent::store($request);
    }
    public function update(Request $request,Plant $XinJiang_apricot)
    {
        return parent::update($request,$XinJiang_apricot);
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






}