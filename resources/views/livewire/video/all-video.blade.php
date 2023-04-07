<div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                @forelse ($videos as $video)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ route('video.watch', ['v' => $video]) }}">
                                        <div class="position-relative">
                                            <img src="{{ asset($video->thumbnail) }}" class="img-thumbnail" alt="{{ $video->title }}">
                                            <div class="badge bg-secondary position-absolute" style="bottom: 8px; right: 16px;">
                                                {{ $video->duration }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $video->title }}</h5>
                                    <p class="text-truncate">{{ $video->description }}</p>
                                </div>
                                <div class="col-md-2">
                                    {{ $video->visibility }}
                                </div>
                                <div class="col-md-2">
                                    {{ $video->created_at->format('d/M/Y - H:i A') }}
                                </div>
                                @if (auth()->user()->owns($video))
                                    <div class="col-md-2">
                                        <a href="{{ route('video.edit', ['channel' => auth()->user()->channel, 'video' => $video->uid]) }}" class="btn btn-light btn-sm">Edit</a>
                                        <a wire:click.prevent="delete('{{ $video->uid }}')" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="text-danger text-center mt-5">Tidak ada video</h1>
                @endforelse
            </div>
            {{ $videos->onEachSide(1)->links() }}
        </div>
    </div>
</div>
