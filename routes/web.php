<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Video\AllVideo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
use App\Http\Livewire\Video\CreateVideo;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/channel/edit/{channel}', [ChannelController::class, 'edit'])->name('channel.edit');
});

Route::middleware('auth')->group(function() {
    Route::get('/videos/create/{channel}', CreateVideo::class)->name('video.create');
    Route::get('/videos/{channel}/{video}/edit', EditVideo::class)->name('video.edit');
    Route::get('/videos/{channel}', AllVideo::class)->name('video.all');
});

Route::get('/watch/{video}', WatchVideo::class)->name('video.watch');
