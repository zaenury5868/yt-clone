<?php

namespace App\Http\Controllers;

use App\Models\Channel;

class ChannelController extends Controller
{
    public function index(Channel $channel) {
        return view('channel.index', compact('channel'));
    }

    public function edit(Channel $channel) {
        return view('channel.edit', compact('channel'));
    }
}
