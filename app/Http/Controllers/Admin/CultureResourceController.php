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
class CultureResourceController extends BaseController
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
        $this->slug = 'culture';
        $this->slug_name = '杏子文化';
    }
    public function index(Request $request)
    {
        return parent::getPlantBySlugView();
    }
    public function store(Request $request)
    {
        return parent::store($request);
    }
    public function update(Request $request,Plant $culture)
    {
        return parent::update($request,$culture);
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