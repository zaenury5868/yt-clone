<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;
use Illuminate\Http\Request;

class WatchVideo extends Component
{
    public $v;
    protected $listeners = ['VideoViewed' => 'countView'];
    protected $queryString = ['v'];

    public function render()
    {
        return view('livewire.video.watch-video', [
            'video' => Video::where('uid', 'like', '%'.$this->v.'%')->first()
        ])->extends('layouts.app');
    }

    public function countView() {
        $this->video->update([
            'views' => $this->video->views + 1
        ]);
    }
}
