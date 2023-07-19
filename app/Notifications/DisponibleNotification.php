<?php

namespace App\Notifications;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class DisponibleNotification extends Notification implements ShouldBroadcast, ShouldQueue
{
    use Queueable;
    use SerializesModels;

    protected Collection $packages;
    /**
     * Create a new notification instance.
     */
    public function __construct(Collection $packages)
    {
        $this->packages = $packages;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject('Paquetes disponibles para retirar (' . $this->packages->count() . ')')
            ->greeting('¡Hola! ' . $notifiable->name . ' ' . $notifiable->lastname)
            ->line('Nos complace informarte que ya están disponibles para ser retiradas')
            ->line('las encomiendas con los siguientes números de trackings');

        foreach ($this->packages as $package) {
            $mail->line($package->tracking);
        }

        $mail->action('Packetes disponibles', url(route('cliente.disponible')))
            ->salutation('Gracias por su atención');

        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
