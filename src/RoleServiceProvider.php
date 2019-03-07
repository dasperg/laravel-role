<?php

namespace Dasperg\Role;

use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        if (! class_exists('CreateRolesTable')) {
//            $this->publishes([
//                __DIR__.'/../database/create_roles_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_roles_table.php'),
//            ], 'migrations');
//            $this->publishes([
//                __DIR__.'/../database/create_role_user_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_role_user_table.php'),
//            ], 'migrations');
//        }

        $this->loadMigrationsFrom(__DIR__.'/../database');
//        $this->loadTranslationsFrom(__DIR__.'/path/to/translations', 'courier');
    }
}
