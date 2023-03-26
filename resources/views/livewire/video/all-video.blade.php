<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @forelse ($videos as $video)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset($video->thumbnail) }}" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-md-3">
                                    <h5>{{ $video->title }}</h5>
                                    <p class="text-truncate">{{ $video->description }}</p>
                                </div>
                                <div class="col-md-2">
                                    {{ $video->visibility }}
                                </div>
                                <div class="col-md-2">
                                    {{ $video->created_at->format('d/m/Y') }}
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('video.edit', ['channel' => auth()->user()->channel, 'video' => $video->uid]) }}" class="btn btn-light btn-sm">Edit</a>
                                    <a wire:click.prevent="delete('{{ $video->uid }}')" class="btn btn-danger btn-sm">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-danger text-center">Tidak ada video</p>
                @endforelse
            </div>
            {{ $videos->links() }}
        </div>
    </div>
</div>
