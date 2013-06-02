<?php namespace Witooh\Cms;

use Illuminate\Support\ServiceProvider;
use Witooh\Cms\Validators\CreateCategoryValidator;
use Witooh\Cms\Validators\CreateContentValidator;
use Witooh\Cms\Validators\UpdateCategoryValidator;
use Witooh\Cms\Validators\UpdateContentValidator;

class CmsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('witooh/cms');

        include __DIR__ . '/../../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Witooh\Cms\Repositories\ICategoryRepository',
            'Witooh\Cms\Repositories\Eloquent\EloquentCategoryRepository'
        );
        $this->app->bind(
            'Witooh\Cms\Repositories\IContentRepository',
            'Witooh\Cms\Repositories\Eloquent\EloquentContentRepository'
        );

        $this->app['cms.category'] = $this->app->share(
            function ($app) {

                $validators = $app['validators'];
                $validators->add('cms.category.create', new CreateCategoryValidator());
                $validators->add('cms.category.update', new UpdateCategoryValidator());

                return new CategoryManager($app['ICategoryRepository']);
            }
        );

        $this->app['cms.content'] = $this->app->share(
            function ($app) {

                $validators = $app['validators'];
                $validators->add('cms.content.create', new CreateContentValidator());
                $validators->add('cms.content.update', new UpdateContentValidator());

                return new ContentManager($app['IContentRepository']);
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}