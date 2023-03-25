<?php

namespace App\Console\Commands;

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Console\Command;

class VideoEndcode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video-encode:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Video Encosing';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $low = (new X264('aac'))->setKiloBitrate(500);
        $high = (new X264('aac'))->setKiloBitrate(1000);

        FFMpeg::fromDisk('videos-temp')
            ->open('ok.mp4')
            ->exportForHLS()
            ->addFormat($low, function($filters) {
                $filters->resize(640, 480);
            })
            ->onProgress(function ($progress) {
                $this->info("Progress= {$progress}%");
            })
            ->addFormat($high, function($filters) {
                $filters->resize(1280, 720);
            })->toDisk('videos-temp')->save('/test/file.m3u8');
    }
}
