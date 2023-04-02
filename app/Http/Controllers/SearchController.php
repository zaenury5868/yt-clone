<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        if($request->input('search_query')) {
            $q = $request->input('search_query');
            $videos = Video::query()->where('title', 'LIKE', "%{$q}%")->orWhere('description', 'LIKE', "%{$q}%")->get();
        } else {
            $videos = [];
        }

        return view('search', compact('videos'));
    }
}
