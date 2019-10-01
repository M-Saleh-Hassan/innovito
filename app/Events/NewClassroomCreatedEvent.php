<?php

namespace App\Events;

use App\Models\Classroom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewClassroomCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $classroom, $employees;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Classroom $classroom, $employees)
    {
        $this->classroom = $classroom;
        $this->employees = $employees;

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
