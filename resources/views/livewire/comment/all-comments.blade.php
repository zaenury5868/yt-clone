<div>
    <h4>{{ $video->AllCommentsCount() }} Komentar</h4>
    @foreach ($video->comments as $comment)
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ asset('/images/' . $comment->user->channel->image) }}" class="rounded-circle" alt="{{ $comment->user->name }}" height="80px;" width="80px;">
                <div class="ml-2">
                    <h5>
                        {{ $comment->user->name }}
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </h5>
                    {{ $comment->body }}
                </div>
            </div>
        </div>
    @endforeach
</div>