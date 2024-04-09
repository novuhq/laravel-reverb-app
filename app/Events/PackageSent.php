<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PackageSent implements ShouldBroadCast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public string $deliveryPersonnel,
        public string $deliveryStatus,
        public string $deliveryTime
    )
    {
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Illuminate\Broadcasting\PrivateChannel
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('delivery');
    }
}
