<?php

namespace App\Http\Livewire\Video;

use App\Models\Like;
use App\Models\Video;
use Livewire\Component;

class Voting extends Component
{
    public $video;
    public $likes;
    public $dislikes;
    public $likeActive;
    public $dislikeActive;

    public function mount(Video $video) {
        $this->video = $video;
    }

    public function render()
    {
        $this->likes = $this->video->likes->count();
        $this->dislikes = $this->video->dislikes->count();
        return view('livewire.video.voting')->extends('layouts.app');
    }

    public function like() {
        if($this->video->doesUserLikedVideo()) {
            Like::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
            $this->likeActive = false;
        } else {
            $this->video->likes()->create([
                'user_id' => auth()->id()
            ]);
            $this->likeActive = true;
        }
    }

    public function dislike() {
        $this->video->dislikes()->create([
            'user_id' => auth()->id()
        ]);
    }
}
