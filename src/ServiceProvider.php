<?php

namespace Terranet\Shop;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Terranet\Shop\Console\ShopTableCommand;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
      $baseDir = base_path('vendor/luxstyle/shop');

      $local = "{$baseDir}/publishes/routes.php";
      $routes = app_path('Http/Luxstyle/Shop/routes.php');

      if (! $this->app->routesAreCached()) {
        if (file_exists($routes)) {
          /** @noinspection PhpIncludeInspection */
          require_once $routes;
        } else {
          /** @noinspection PhpIncludeInspection */
          require_once $local;
        }
      }

      // routes
      $this->publishes([$local => $routes], 'routes');

      // resources
      $this->publishes(["{$baseDir}/publishes/Modules" => app_path('Http/Terranet/Administrator/Modules')], 'resources');

      // models
      $this->publishes(["{$baseDir}/publishes/Models" => app_path('Models')], 'models');
    }
    
		public function register()
		{
			$this->registerCommands();
		}
		
		protected function registerCommands()
		{
			$this->app->singleton('command.shop.table', function ($app) {
				return new ShopTableCommand($app['files'], $app['composer']);
			});
			
			$this->commands(['command.shop.table']);
		}
}
