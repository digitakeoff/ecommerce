<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ModelCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $namespace;
    public $model_id;
    public $temp_path;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($namespace, $model_id, $temp_path)
    {
        $this->namespace = $namespace;
        $this->model_id = $model_id;
        $this->temp_path = $temp_path;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
