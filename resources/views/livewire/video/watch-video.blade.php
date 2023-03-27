<div>
    @push('custom-css')
        <link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
    @endpush
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <video controls preload="auto" class="video-js" data-setup="{}">
                    <source src="{{ asset('videos/' . $video->uid . '/' . $video->processed_file) }}" type="application/x-mpegURL" />
                    <p class="vjs-no-js">
                        to view this video please enable javascript, and consider upgrading to a web browser that 
                        <a href="https://videojs.com/html5-video-support/" target="_blank">support html5 video</a>
                    </p>  
                </video>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>
    @endpush
</div>
