<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Passport::loadKeysFrom(__DIR__.'/');

        Passport::loadKeysFrom(base_path('storage'));
        // Passport::hashClientSecrets();

        // Gate::define('isGreyManager',function($user){
        //     return $user->isGreyManager == true;
        // });
        // Gate::define('isSysAdmin',function($user){
        //     return $user->isSysAdmin == true;
        // });
        // Gate::define('isAppAdmin',function($user){
        //     return $user->isAppAdmin == true;
        // });
        // Gate::define('isUser',function($user){
        //     return $user->isUser == true;
        // });

        //
    }
}
