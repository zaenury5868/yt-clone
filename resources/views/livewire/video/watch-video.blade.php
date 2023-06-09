<div>
    @section('title', isset($title) ? $title : $video->title . ' - Youtube Cloning')
    @push('custom-css')
        <!-- Open Graph meta tags for social media -->
        <meta property="og:title" content="{{ $video->title }} - Youtube Cloning">
        <meta property="og:description" content="{{ $video->description }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ URL::full() }}">
        <meta property="og:image" content="{{ asset('videos/' . $video->uid . '/' . $video->thumbnail_image) }}">
        <meta property="og:image:height" content="300" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:alt" content="{{ $video->description }}">
        <meta property="og:locale" content="id_ID" />
        <meta property="og:site_name" content="Youtube Cloning" />
        <meta property="og:country-name" content="{{ str_replace('_', '-', app()->getLocale()) }}"/>
        <meta property="article:publisher" content="https://www.facebook.com/zaenury5868" />
        
        <!-- Twitter Card meta tags for social media -->
        <meta property="twitter:domain" content="{{ Request::getHost() }}">
        <meta property="twitter:site" content="@ZaenuryWibowo">
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ URL::full() }}">
        <meta property="twitter:title" content="{{ $video->title }} - Youtube Cloning">
        <meta property="twitter:description" content="{{ $video->description }}">
        <meta property="twitter:image" content="{{ asset('videos/' . $video->uid . '/' . $video->thumbnail_image) }}">
        <meta property="twitter:label1" content="Official Youtube Cloning" />
        
        <!-- Canonical link tag -->
        <link rel="canonical" href="{{ URL::full() }}">
        <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet">
        <link href="https://unpkg.com/silvermine-videojs-quality-selector@1.1.2/dist/css/quality-selector.css" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="row">
            <div class=" p-0" id="page">
                <div class="video-container" wire:ignore>
                    <video autoplay preload="auto" id="yt-video" class="video-js vjs-fill vjs-theme-city vjs-styles=defaults vjs-big-play-centered" data-setup='{}' poster="{{ asset('videos/' . $video->uid . '/' . $video->thumbnail_image) }}">
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
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div>
                                <h3 class="mt-4">{{ $video->title }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="me-auto">
                            <div class="d-flex align-items-center gap-4">
                                <img src="{{ $video->channel->picture }}" class="rounded-circle" height="50" width="50">
                                <a href="{{ route('video.channel.index', ['channel' => $video->channel->name]) }}" class="text-decoration-none">
                                    <h4 class="h6" style="margin-bottom: 0;">{{ $video->channel->name }}</h4>
                                    <span class="gray-text">{{ short_number($video->channel->subscribers()) }} subscriber</span>
                                </a>
                                @livewire('channel.channel-info', ['channel' => $video->channel])
                            </div>
                        </div>
                        <div class="ms-auto">
                            @livewire('video.voting', ['video' => $video])
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card border-0" style="background: #f1f1f1">
                            <div class="card-body">
                                <p class="gray-text fw-bold">{{ short_number($video->views) }} x ditonton {{ $video->created_at->diffForHumans() }} </p>
                                <p class="gray-text">{{ $video->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <h4>{{ $video->AllCommentsCount() }} Komentar</h4>
                    <div class="dropdown">
                        <a class="d-flex align-items-center gap-2 text-decoration-none" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="material-icons">sort</div>
                            <span class="text-capitalize fw-semibold">urutkan</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="javascript:void(0)" wire.click.prevent="topComments" class="dropdown-item text-upperfirst">
                                komentar teratas
                            </a>
                            <a href="javascript:void(0)" wire.click.prevent="latestComments" class="dropdown-item text-upperfirst">
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
        </div>
    </div>
    @push('scripts')
        <script src="https://unpkg.com/video.js@7/dist/video.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-quality-levels/2.0.9/videojs-contrib-quality-levels.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/videojs-hls-quality-selector@1.1.1/dist/videojs-hls-quality-selector.min.js"></script>
        <script src="https://cdn.sc.gl/videojs-hotkeys/latest/videojs.hotkeys.min.js"></script>
        <script src="./js/custom.js"></script>
    @endpush
</div>
