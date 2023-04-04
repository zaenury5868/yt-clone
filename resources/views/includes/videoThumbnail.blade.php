<a href="{{ route('video.watch', $video)}}">
    <div class="position-relative">
        <img class="card-img-top" src="{{asset( $video->thumbnail)}}" alt="{{ $video->title }}">
        <div class="badge bg-secondary position-absolute" style="bottom: 8px; right: 16px;">
            {{ $video->duration }}
        </div>
    </div>
</a>