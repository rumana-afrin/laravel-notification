<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Broadcasting\PrivateChannel;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class NewItemNotification extends Notification
{
    
    public $item;
    public $adminId;

    public function __construct($item, $adminId)
    {
        $this->item = $item;
        $this->adminId = $adminId;

        Log::info('Broadcasting item ID:', ['item_id' => $this->item->id]);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */


    public function via($notifiable)
    {
        return ['broadcast', 'database'];
    }

    public function toBroadcast($notifiable)
    {
        // Log::info('Broadcasting notification to admin', [
        //     'admin_id' => $notifiable->id,
        //     'user_name' => $this->user->name,
        //     'user_email' => $this->user->email,
        // ]);

        return new BroadcastMessage([
            'message' => "New item created: at " . now()->format('h:i A'),
            'id' => $this->item->id,
            'title' => $this->item->title,
            'user_id' => $this->item->user_id,
            'user_name' => $this->item->user->name,
            'user_email' => $this->item->user->email,
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "New item created: at " . now()->format('h:i A'),
            'id' => $this->item->id,
            'title' => $this->item->title,
            'user_id' => $this->item->user_id,
            'user_name' => $this->item->user->name,
            'user_email' => $this->item->user->email,
        ];
    }

}
