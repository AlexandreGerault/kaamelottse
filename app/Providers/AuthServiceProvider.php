<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Policies\MessagePolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Message::class => MessagePolicy::class,
        Product::class => ProductPolicy::class,
        Order::class => OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultStringLength(191);
        $this->registerPolicies();

        Gate::define('access-backoffice', function (User $user) {
            return $user->hasRole('administrateur');
        });
        Gate::define('access-backoffice.articles', function (User $user) {
            return $user->hasPermission('article');
        });
        Gate::define('access-backoffice.messages', function (User $user) {
            return $user->hasPermission('message');
        });
        Gate::define('access-backoffice.quotes', function (User $user) {
            return $user->hasPermission('quote');
        });
        Gate::define('deliver', function (User $user) {
            return $user->hasPermission('deliver');
        });


        //
    }
}
