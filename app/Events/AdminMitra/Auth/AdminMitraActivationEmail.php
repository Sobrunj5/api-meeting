<?php

namespace App\Events\AdminMitra\Auth;

use App\Mitra;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminMitraActivationEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mitra;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Mitra $mitra)
    {
        $this->mitra =$mitra;
    }
}