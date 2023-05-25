<?php
// Autentifikace a autorizace service provider třídy, který registruje policies pro modely employee a room
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
				'App\Employee' => 'App\Policies\EmployeesPolicy',
				'App\Room' => 'App\Policies\RoomsPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
				$this->registerPolicies();
        //
    }
}
