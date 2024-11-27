<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;


class NewUserRegistered extends Notification

{
    public $user;
    public $adminId;

    public function __construct($user, $adminId)
    {
        $this->user = $user;
        $this->adminId = $adminId;
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

    public function broadcastOn()
    {
        // Log::info("private channel" , ['admin' =>  $this->adminId]);
        return new PrivateChannel('new-user.' . $this->adminId);
    }

    public function broadcastAs()
    {
        return 'NewUserRegistered';
    }

    public function toBroadcast($notifiable)
    {
        // Log::info('Broadcasting notification to admin', [
        //     'admin_id' => $notifiable->id,
        //     'user_name' => $this->user->name,
        //     'user_email' => $this->user->email,
        // ]);

        return new BroadcastMessage([
            'message' => "New user registered: at " . now()->format('h:i A'),
            'id' => $this->user->id,
            'name' =>$this->user->name, 
            'email' =>$this->user->email, 
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "New user registered: at " . now()->format('h:i A'),
            'id' => $this->user->id,
            'name' =>$this->user->name, 
            'email' =>$this->user->email, 
        ];
    }


 
}
