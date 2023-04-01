<?php

namespace App\Http\Livewire\Comment;

use App\Models\Video;
use Livewire\Component;

class NewComment extends Component
{
    public $video;
    public $body;
    public $col;

    public function mount(Video $video) {
        $this->video = $video;
    }
    
    public function render()
    {
        return view('livewire.comment.new-comment')->extends('layouts.app');
    }
}
