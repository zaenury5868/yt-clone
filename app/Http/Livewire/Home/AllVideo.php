<?php

namespace App\Http\Livewire\Home;

use App\Models\Video;
use Livewire\Component;

class AllVideo extends Component
{
    public $videos;
    
    public function loadCardData() {
        sleep(rand(1, 3));
            $this->videos = Video::where('visibility', '!=','private')->orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.home.all-video');
    }
}
