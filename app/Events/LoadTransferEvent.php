<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoadTransferEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $senderNumber;
    public $receiverNumber;
    public $amount;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($senderNumber, $receiverNumber, $amount)
    {
        $this->senderNumber = $senderNumber;
        $this->receiverNumber = $receiverNumber;
        $this->amount = $amount;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('load-transfer');
    }
    public function broadcastWith()
    {
        return ['sender' => $this->senderNumber, 'receiver' => $this->receiverNumber, 'amount' => $this->amount];
    }
}
