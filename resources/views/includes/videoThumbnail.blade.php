<a href="{{ route('video.watch', ['v' => $video])}}">
    <div class="position-relative">
        <img class="img-fluid" src="{{asset( $video->thumbnail)}}" loading="lazy" height="60" width="600" alt="{{ $video->title }}" title="{{ $video->title }}" style="border-radius: 0.75rem;">
        <div class="badge bg-secondary position-absolute" style="bottom: 8px; right: 16px;">
            {{ $video->duration }}
        </div>
    </div>
</a>