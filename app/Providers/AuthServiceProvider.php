<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\HtmlString;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl) {
            return (new MailMessage)
            ->subject('Verificar cuenta')
            ->greeting("Hola " . $notifiable->name)
            ->line('Por favor, para verificar la cuenta haz click en el siguiente botón: ')
            ->action('Verificar cuenta', $verificationUrl)
            ->line('Si no has creado la cuenta, puedes ignorar este mensaje.')
            ->salutation(new HtmlString(
            "Saludos.".'<br>' .'<strong>'. "Nuestro equipo" . '</strong>'
            ));
            };
    }
}
