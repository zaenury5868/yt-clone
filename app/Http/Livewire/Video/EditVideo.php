<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use App\Rules\minWords;
use Livewire\Component;

class EditVideo extends Component
{
    public Channel $channel;
    public Video $video;
    public $videoFile;

    protected $rules = [
        'video.title' => 'required|min:100',
        'video.description' => 'nullable|max:1000',
        'video.visibility' => 'required|in:private,public,unlisted'
    ];

    public function mount($channel, $video) {
        $this->channel = $channel;
        $this->video = $video;
    }
    public function render()
    {
        return view('livewire.video.edit-video')->extends('layouts.app');
    }

    public function update() {
        $this->validate(([
            'video.title' => [new minWords]
        ]));

        $this->video->update([
            'title' => ucwords($this->video->title),
            'description' => $this->video->description,
            'visibility' => $this->video->visibility,
        ]);

        session()->flash('message', 'video was update');
    }
}
