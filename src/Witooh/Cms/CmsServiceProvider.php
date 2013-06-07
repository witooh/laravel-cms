<?php namespace Witooh\Cms;

use Illuminate\Support\ServiceProvider;
use Witooh\Cms\Validators\CreateCategoryValidator;
use Witooh\Cms\Validators\CreateContentValidator;
use Witooh\Cms\Validators\UpdateCategoryValidator;
use Witooh\Cms\Validators\UpdateContentValidator;
use Config;
use Validators;

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
                $validators->add('cms.category.create', 'Witooh\Cms\Validators\CreateCategoryValidator');
                $validators->add('cms.category.update', 'Witooh\Cms\Validators\UpdateCategoryValidator');

                return new CategoryManager($app['Witooh\Cms\Repositories\ICategoryRepository']);
            }
        );

        $this->app['cms.content'] = $this->app->share(
            function ($app) {

                $validators = $app['validators'];
                $validators->add('cms.content.create', 'Witooh\Cms\Validators\CreateContentValidator');
                $validators->add('cms.content.update', 'Witooh\Cms\Validators\UpdateContentValidator');

                return new ContentManager($app['Witooh\Cms\Repositories\IContentRepository']);
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