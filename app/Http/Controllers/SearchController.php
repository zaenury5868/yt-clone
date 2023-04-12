<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $query = $request->input('search_query');
        if(!empty($query)) {
            if($query) {
                $videos = Video::query()->where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->get();
            } else {
                $videos = [];
            }
    
            return view('search', compact('videos', 'query'));
        } else {
            return redirect()->back();
        }
    }
}
