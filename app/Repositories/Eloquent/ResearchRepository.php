<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ResearchRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ResearchRepository extends BaseRepository implements ResearchRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.research.research.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.research.research.model');
    }
    public function getPlantBySlug($slug)
    {
        return $this->findBySlug($slug);
    }

}
