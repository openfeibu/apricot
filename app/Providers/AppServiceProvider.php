<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Common\Tree;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(public_path().'/themes/vender/filer', 'filer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tree',function(){
            return new Tree;
        });
        $this->app->bind(
            'App\Repositories\Eloquent\PageRepositoryInterface',
            \App\Repositories\Eloquent\PageRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\PageCategoryRepositoryInterface',
            \App\Repositories\Eloquent\PageCategoryRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\PageRecruitRepositoryInterface',
            \App\Repositories\Eloquent\PageRecruitRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\SettingRepositoryInterface',
            \App\Repositories\Eloquent\SettingRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\BannerRepositoryInterface',
            \App\Repositories\Eloquent\BannerRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\LinkRepositoryInterface',
            \App\Repositories\Eloquent\LinkRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\NavRepositoryInterface',
            \App\Repositories\Eloquent\NavRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\NavCategoryRepositoryInterface',
            \App\Repositories\Eloquent\NavCategoryRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\SinglePageRepositoryInterface',
            \App\Repositories\Eloquent\SinglePageRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\PlantRepositoryInterface',
            \App\Repositories\Eloquent\PlantRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\CatalogRepositoryInterface',
            \App\Repositories\Eloquent\CatalogRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\ResearchRepositoryInterface',
            \App\Repositories\Eloquent\ResearchRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\QuestionRepositoryInterface',
            \App\Repositories\Eloquent\QuestionRepository::class
        );
        $this->app->bind('question_repository',function($app){
            return new \App\Repositories\Eloquent\QuestionRepository($app);
        });
        $this->app->bind('nav_repository',function($app){
            return new \App\Repositories\Eloquent\NavRepository($app);
        });
        $this->app->bind('page_repository',function($app){
            return new \App\Repositories\Eloquent\PageRepository($app);
        });
        $this->app->bind('plant_repository',function($app){
            return new \App\Repositories\Eloquent\PlantRepository($app);
        });
        $this->app->bind('filer', function ($app) {
            return new \App\Helpers\Filer\Filer();
        });
        $this->app->singleton('image', function ($app) {
            return new ImageManager($app['config']->get('image'));
        });
        $this->app->bind('image_service', function ($app) {
            return new \App\Services\ImageService($app->request);
        });
    }

    public function provides()
    {

    }
}
