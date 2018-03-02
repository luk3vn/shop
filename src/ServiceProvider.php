<?php

namespace Terranet\Shop;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Terranet\Shop\Console\ShopTableCommand;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {

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
