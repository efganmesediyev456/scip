<?php

namespace App\Notifications;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class NewPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private string $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->password = Str::random();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param Admin $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $notifiable->password = Hash::make($this->password);
        $notifiable->password_changed_at = now();
        $notifiable->save();

        return (new MailMessage())
            ->subject('Your account is ready')
            ->level('information')
            ->line("Hey " . ucwords($notifiable->name) . ".")
            ->line(new HtmlString("<p>Your password is: <b>$this->password</b></p>"))
            ->line('Thank you for using our application!');
    }
}
