<?php

namespace Terranet\Shop\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;

class ShopTableCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
	
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'make:shop
                    {--views : Only scaffold the authentication views}
                    {--force : Overwrite existing views by default}';

    /**
     * The console command description.
     *
     * @var string
     */
    
    protected $description = 'Create a migration for the permission database tables';
		/**
		 * The filesystem instance.
		 *
		 * @var \Illuminate\Filesystem\Filesystem
		 */
		protected $stubs = [
			'seeds'       => [],
			'migrations'  => [

			]
		];

    /**
     * @var \Illuminate\Foundation\Composer
     */
    protected $composer;

    /**
     * Create a new session table command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem $files
     * @param  \Illuminate\Foundation\Composer $composer
     */
    
    public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct();

        $this->files = $files;

        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
	    $this->createBaseDatabase();
	    $this->info('User tables created successfully!');
      $this->composer->dumpAutoloads();
    }

    /**
     * Create a base migration file for the session.
     *
     * @return string
     */
    protected function createBaseDatabase()
    {
        foreach ($this->stubs['migrations'] as $name){
            $this->files->put(
			        $this->laravel['migration.creator']->create($name, database_path('migrations/')),
			        $this->files->get(__DIR__ . '/make/migrations/'. $name .'.stub')
		        );
            sleep(1);
        }

      foreach ($this->stubs['seeds'] as $name){
        if (file_exists(database_path("seeds/{$name}.php")) && ! $this->option('force')) {
          if (! $this->confirm("The [{$name}] view already exists. Do you want to replace it?")) {
            continue;
          }
        }
        copy(
          __DIR__ . "/make/seeds/{$name}.stub",
          database_path("seeds/{$name}.php")
        );
      }
    }

}
