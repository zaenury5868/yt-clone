<?php

namespace App\Http\Livewire\Home;

use App\Models\Video;
use Livewire\Component;

class AllVideo extends Component
{
    public $videos;

    public $totalRecords;
    public $loadAmount = 6;

    public function loadMore() {
        $this->loadAmount += 6;
    }

    public function mount() {
        $this->totalRecords = Video::count();
    }

    public function loadCardData() {
        sleep(rand(1, 3));
        $this->videos = Video::where('visibility', '!=','private')->orderBy('created_at', 'DESC')->limit($this->loadAmount)->get();
    }

    public function render()
    {
        return view('livewire.home.all-video');
    }
}
