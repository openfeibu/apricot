<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CatalogRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Tree;

class CatalogRepository extends BaseRepository implements CatalogRepositoryInterface
{
    public function model()
    {
        return config('model.plant.catalog.model');
    }
    public function getCatalogTree($plant_id)
    {
        $catalogs = $this->where(['plant_id' => $plant_id])->orderBy('order','asc')->orderBy('id','asc')->all()->toArray();
        $catalogs = Tree::vTree($catalogs);
        return $catalogs;
    }
    public function getTops($plant_id)
    {
        $catalogs = $this->where(['plant_id' => $plant_id,'parent_id' => 0])->orderBy('order','asc')->orderBy('id','asc')->all()->toArray();
        return $catalogs;
    }
}