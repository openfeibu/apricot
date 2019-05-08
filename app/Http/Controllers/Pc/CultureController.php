<?php

namespace App\Http\Controllers\Pc;

use Route,Auth;
use App\Http\Controllers\Pc\Controller as BaseController;
use App\Repositories\Eloquent\PlantRepositoryInterface;
use App\Repositories\Eloquent\CatalogRepositoryInterface;

class CultureController extends BaseController
{
    public function __construct(PlantRepositoryInterface $plant_repository,CatalogRepositoryInterface $catalog_repository)
    {
        parent::__construct();
        $this->plant_repository = $plant_repository;
        $this->catalog_repository = $catalog_repository;
        $this->slug = 'culture';
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plant = $this->plant_repository->getPlantBySlug($this->slug);
        $catalogs = $this->catalog_repository->getCatalogTree($plant['id']);

        return $this->response->title('杏子文化')
            ->view('plant.show')
            ->data([
                'plant' => $plant,
                'catalogs' => $catalogs,
            ])
            ->output();
    }

}
