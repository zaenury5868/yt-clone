@foreach ($comments as $comment)
    <div class="d-flex my-4" x-data="{ open: false}">
        <div class="d-flex">
            <img src="{{ asset('/images/' . $comment->user->channel->image) }}" class="rounded-circle" alt="{{ $comment->user->name }}" height="50px;" width="50px;">
            <div class="ml-2">
                <h5>
                    {{ $comment->user->name }}
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </h5>
                {{ $comment->body }}
                @if ($comment->replies->count())
                    <a class="text-capitalize text-decoration-none" href="" @click.prevent="open = !open">{{ $comment->replies->count() }} balas komentar</a>
                    <div x-show="open">
                        @include('includes.recursive', ['comments' => $comment->replies])
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach