<?php

namespace App\Providers;

use App\Models\Admin;
use App\Support\Authentication\JwtGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Auth::extend('jwt', function ($app, $name, array $config) {
            return new JwtGuard(Auth::createUserProvider($config['provider']), request(), $config['provider']);
        });

        foreach (config('admin.roles') as $role => $permissions) {
            foreach ($permissions as $permission=>$available) {
                Gate::define($permission, function (Admin $admin) use ($permission, $available) {
                    return $available && array_key_exists($admin->role, config('admin.roles'))
                        && config("admin.roles.$admin->role.$permission");
                });
            }
        }
    }
}
