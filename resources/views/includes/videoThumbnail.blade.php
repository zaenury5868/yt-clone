<a href="{{ route('video.watch', $video)}}">
    <div class="position-relative">
        <img class="img-fluid" src="{{asset( $video->thumbnail)}}" alt="{{ $video->title }}" style="border-radius: 0.75rem;">
        <div class="badge bg-secondary position-absolute" style="bottom: 8px; right: 16px;">
            {{ $video->duration }}
        </div>
    </div>
</a>