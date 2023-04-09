<?php

use App\Models\Video;
use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Video\AllVideo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ChannelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('minim')->group(function(){ 
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/feed/trending/', function() {
        
    })->name('video.trending');

    Auth::routes();
    
    Route::middleware('auth')->group(function() {
        Route::get('/channel/edit/{channel}', [ChannelController::class, 'edit'])->name('channel.edit');
    });
    
    Route::middleware('auth')->group(function() {
        Route::get('/videos/create/{channel}', CreateVideo::class)->name('video.create');
        Route::get('/videos/{channel}/{video}/edit', EditVideo::class)->name('video.edit');
        Route::get('/videos/{channel}', AllVideo::class)->name('video.all');
        Route::get('/feed/subscriptions', function () {
            if(Auth::check()) {
                $channels = Auth::user()->subscribedChannels()->with('videos')->get()->pluck('videos');
            } else {
                $channels = Channel::get()->pluck('videos');
            }
            return view('subscriber.subscription', compact('channels'));
        })->name('video.subscription');
        Route::get('/feed/history', function() {

        })->name('video.history');
        Route::get('/playlist', function() {

        })->name('video.like');
    });
    
    Route::get('/watch', WatchVideo::class)->name('video.watch');
    Route::get('/results/', [SearchController::class, 'search'])->name('search');
    Route::get('/@{channel}', [ChannelController::class, 'index'])->name('channel.index');
});

