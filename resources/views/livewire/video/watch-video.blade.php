<div>
    @push('custom-css')
        <link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
    @endpush
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="video-container" wire:ignore>
                    <video controls autoplay preload="auto" id="yt-video" class="video-js vjs-fill vjs-theme-city vjs-styles=defaults vjs-big-play-centered" data-setup='{}' poster="{{ asset('videos/' . $video->uid . '/' . $video->thumbnail_image) }}">
                        <source src="{{ asset('videos/' . $video->uid . '/' . $video->processed_file) }}" type="application/x-mpegURL" />
                        <p class="vjs-no-js">
                            to view this video please enable javascript, and consider upgrading to a web browser that 
                            <a href="https://videojs.com/html5-video-support/" target="_blank">support html5 video</a>
                        </p>  
                    </video>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="mt-4">{{ $video->title }}</h3>
                                <p class="gray-text">{{ $video->views }} x ditonton • {{ Carbon\Carbon::parse($video->uploaded_date)->translatedFormat('d F Y') }} </p>
                            </div>
                            <div>
                                @livewire('video.voting', ['video' => $video])
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        @livewire('channel.channel-info', ['channel' => $video->channel])
                    </div>
                </div>
                <hr>
                <div class="d-flex gap-4">
                    <h4>{{ $video->AllCommentsCount() }} Komentar</h4>
                    <div class="dropdown">
                        <a class="d-flex align-items-center gap-2 dropdown-toggle text-decoration-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="material-icons">sort</div>
                            <span class="text-capitalize fw-semibold">urutkan</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="javascript:void(0)" wire.click.prevent="topComments" class="dropdown-item text-capitalize">
                                komentar teratas
                            </a>
                            <a href="javascript:void(0)" wire.click.prevent="latestComments" class="dropdown-item text-capitalize">
                                terbaru dulu
                            </a>
                        </div>
                    </div>
                </div>
                @auth
                    <div class="my-2">
                        @livewire('comment.new-comment', ['video' => $video, 'col' => 0, 'key' => $video->id])
                    </div>
                @endauth
                @livewire('comment.all-comments', ['video' => $video])
            </div>
            {{-- <div class="col-md-4">

            </div> --}}
        </div>
    </div>
    @push('scripts')
        <script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>
        <script>
            var player = videojs('yt-video')
            player.on('timeupdate', function() {
                if(this.currentTime() > 3) {
                    this.off('timeupdate')
                    Livewire.emit('VideoViewed')
                }
            })
        </script>
    @endpush
</div>
