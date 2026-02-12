<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {

            return (new MailMessage)
                ->subject('Confirme su correo electrónico') // ← Subject
                ->greeting('¡Hola!') // ← saludo
                ->line('Por favor, haga clic en el botón de abajo para verificar su dirección de correo electrónico.')
                ->action('Confirme su correo electrónico', $url) // ← texto del botón
                ->line('Si no ha creado una cuenta, no se requiere ninguna acción adicional.')
                ->salutation("Saludos, devjobs");
        });
    }
}
