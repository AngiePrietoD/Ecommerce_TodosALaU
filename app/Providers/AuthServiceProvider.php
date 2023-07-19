<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Package;
use App\Models\User;
use App\Policies\IsAdminPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => IsAdminPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
                ->greeting('¡Hola! ' . $notifiable->name . ' ' . $notifiable->lastname)
                ->line(Lang::get('Please click the button below to verify your email address.'))
                ->action(Lang::get('Verify Email Address'), $url)
                ->line(Lang::get('If you did not create an account, no further action is required.'));
    
        });

        Gate::define('isadmin', function (User $user) {
            return $user->id === 1
                ? Response::allow()
                : Response::deny('Acceso restringido para administrador.');
        });

        Gate::define('update-package', function (User $user, Package $package) {
            return $user->id === $package->user_id
                ? Response::allow()
                : Response::deny('Usuario no tiene acceso a este paquete.');
        });

        Gate::define('setTransport', function (User $user, Package $package) {
            return $user->id === $package->user_id
                ? Response::allow()
                : Response::deny('Usuario no tiene acceso a este paquete.');
        });

        Gate::define('mount', function (User $user, Package $package) {
            return $user->id === $package->user_id
                ? Response::allow()
                : Response::deny('Usuario no tiene acceso a este paquete.');
        });
    }
}
