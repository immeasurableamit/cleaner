<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender_id;
    public $rec_id;
    public $message;
    public $files;
    public $created_at;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sender_id, $rec_id, $message, $files, $created_at)
    {
        $this->sender_id = $sender_id;
        $this->rec_id = $rec_id;
        $this->message = $message;
        $this->files = $files;
        $this->created_at = $created_at;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return[
            new PrivateChannel('chat-'.$this->sender_id),
            new PrivateChannel('chat-'.$this->rec_id)
        ];
    }

    /*public function broadcastAs()
    {
        return $this->message;
    }*/
}
