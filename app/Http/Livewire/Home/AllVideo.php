<?php

namespace App\Http\Livewire\Home;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;

class AllVideo extends Component
{
    public $videos;
    public $channel;
    public $video;
    public $uid;
    public $title;
    public $description;
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
        $this->videos = Video::where('visibility', '!=','private')->orderBy('created_at', 'DESC')->get();
        $this->channel = Channel::all();
    }

    public function detailVideo($uid) {
        $detail = Video::findOrFail($uid);
        $this->uid = \route('video.watch', ['v' => $detail->uid]);
        $this->title = $detail->title;
        $this->description = $detail->description;
        $this->video = $detail;
        $this->dispatchBrowserEvent('showdetailModal');
    }

    public function render()
    {
        return view('livewire.home.all-video');
    }
}
