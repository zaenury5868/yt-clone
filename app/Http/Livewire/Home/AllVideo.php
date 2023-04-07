<?php

namespace App\Http\Livewire\Home;

use Share;
use App\Models\Video;
use Livewire\Component;

class AllVideo extends Component
{
    public $videos;
    public $uid;
    public $share;
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
    }

    public function detailVideo($uid) {
        $detail = Video::findOrFail($uid);
        $this->uid = \route('video.watch', ['v' => $detail->uid]);
        // $this->share = Share::page(\route('video.watch', ['v' => $detail->uid]), 'testing')
        //                 ->facebook()
        //                 ->telegram()
        //                 ->whatsapp()
        //                 ->linkedin()
        //                 ->pinterest()
        //                 ->twitter()
        //                 ->reddit();
        $this->dispatchBrowserEvent('showdetailModal');
    }

    public function render()
    {
        return view('livewire.home.all-video', [
            
        ]);
    }
}
