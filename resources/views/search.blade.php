@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="space-y">
                    @if ($videos->count())
                        <button class="btn btn-group text-capitalize fw-semibold">
                            <i class="material-icons">tune</i>
                            <span style="margin-left: 0.375rem;">filter</span>
                        </button>
                        <hr>
                    @endif
                    @forelse ($videos as $video)
                        <div class="card border-0" style="background: none;">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{ route('video.watch', ['v' => $video])}}" class="text-decoration-none">
                                        <div class="position-relative">
                                            <img src="{{ asset($video->thumbnail) }}" alt="{{ $video->title }}" style="height: 100%; width: 333px;">
                                            <div class="badge bg-secondary position-absolute" style="bottom: 8px; right: 16px;">
                                                {{ $video->duration }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <a href="{{ route('video.watch', ['v' => $video])}}" class="text-decoration-none">
                                            <h4 class="text-black">{{ $video->title }} </h4>
                                        </a>
                                    </div>
                                    <div class="row">
                                        <p class="gray-text font-weight-bold" style="line-height: 0.2px">{{ $video->views}}x ditonton • {{$video->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div class="row my-3">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('channel.index', ['channel' => $video->channel->name]) }}" class="text-decoration-none">
                                                <img src="{{ asset('/images/' . $video->channel->image) }}" class="rounded-circle" alt="{{ $video->channel->name }}" width="30" style="margin-right: 8px">
                                                <span class="gray-text font-weight-bold">
                                                    {{ $video->channel->name }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <a href="{{ route('video.watch', ['v' => $video])}}" class="text-decoration-none">
                                            <p class="text-truncate">
                                                {{ Str::words($video->description, 8, '...') }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-danger text-center mt-5">Tidak ada video</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
