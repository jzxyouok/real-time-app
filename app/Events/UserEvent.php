<?php
namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class UserHasRegistered extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $user;
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        User::firstOrFail() = $user;
    }
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['presence_channel'];
    }
}