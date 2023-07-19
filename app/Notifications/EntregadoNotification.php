<?php

namespace App\Notifications;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class EntregadoNotification extends Notification implements ShouldBroadcast, ShouldQueue
{
    use Queueable;
    use SerializesModels;

    protected Package $package;
    /**
     * Create a new notification instance.
     */
    public function __construct(Package $package)
    {
        $this->package = $package;
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
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject('Paquete entregado ('.$this->package->tracking.')')
            ->greeting('Hola! ' . $notifiable->name . ' ' . $notifiable->lastname)
            ->line('Nos complace informarte que hemos entregado tu encomienda')
            ->line('Tracking: ' . $this->package->tracking)
            ->line('Proveedor: ' . $this->package->shipper->name)
            ->action('Paquetes entregados', url(route('cliente.recibidos')))
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
