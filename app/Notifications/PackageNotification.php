<?php

namespace App\Notifications;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class PackageNotification extends Notification implements ShouldBroadcast, ShouldQueue
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
    public function toMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject('Paquete recibido')
            ->greeting('Hola! ' . $notifiable->name . ' ' . $notifiable->lastname)
            ->line('Nos complace informarte que hemos recibido tu encomienda')
            ->line('Tracking: ' . $this->package->tracking)
            ->line('Proveedor: ' . $this->package->shipper->name)
            ->line('Tipo de Empaque: ' . $this->package->packageType->name)
            ->line('Medidas: ' . number_format($this->package->ancho) . ' X ' . number_format($this->package->alto) . ' X ' . number_format($this->package->largo))
            ->line('Peso: ' . $this->package->peso . ' Libras')     
            ->line('Notas: ' . $this->package->notas)
            ->line('Haz click en el link para darnos instrucciones de tu carga.')
            ->action('Instrucciones de carga', url(route('cliente.instrucciones', $this->package->id)))
            ->salutation('Gracias por su atención');

        foreach ($this->package->photos as $photo) {
            $mail->attach($photo->filename);
        }

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
