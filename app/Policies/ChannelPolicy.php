<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Channel;

class ChannelPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Channel $channel)
    {
        return $user->id === $channel->user_id;
    }
}
