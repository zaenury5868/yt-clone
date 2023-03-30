<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;

class ChannelInfo extends Component
{
    public $channel;
    public $userSubscribed = false;

    public function mount(Channel $channel) {
        $this->channel = $channel;
        if(auth()->user()->isSubscribedTo($this->channel)) {
            $this->userSubscribed = true;
        }
    }

    public function render()
    {
        return view('livewire.channel.channel-info')->extends('layouts.app');
    }
}
