<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\SinglePageRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class SinglePageRepository extends BaseRepository implements SinglePageRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.single_page.single_page.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.single_page.single_page.model');
    }

    /**
     * Get page by id or slug.
     *
     * @return void
     */
    public function getSinglePage($var)
    {
        return $this->findBySlug($var);
    }
}
