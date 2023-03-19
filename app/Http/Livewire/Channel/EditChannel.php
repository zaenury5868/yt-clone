<?php

namespace App\Http\Livewire\Channel;

use Livewire\Component;

class EditChannel extends Component
{
    public $name = 'Ahmed';
    public function render()
    {
        return view('livewire.channel.edit-channel');
    }
}
