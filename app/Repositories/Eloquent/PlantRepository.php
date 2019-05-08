<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\PlantRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class PlantRepository extends BaseRepository implements PlantRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.plant.plant.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.plant.plant.model');
    }
    public function getPlantBySlug($slug)
    {
        return $this->findBySlug($slug);
    }
    public function getPlantsBySlug($slug,$count)
    {
        $plants = $this->where(['slug' => $slug])->limit($count)->all()->toArray();
        foreach ($plants as $key => $plant)
        {
            $plant['image'] = url("/image/original".$plant['image']);
            $plant['popularity'] = drop_blank(cut_html_str(strip_tags($plant['content']),50));
            $plants[$key] = $plant;
        }
        return $plants;
    }
}
