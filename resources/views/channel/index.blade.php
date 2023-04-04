@extends('layouts.app')

@section('content')
    <div class="p-10 rounded-lg bg-primary">
        <div class="container">
            <h1 class="display-4 text-white">{{ $channel->name }}</h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ $channel->picture }}" class="rounded-circle" height="130px;" width="130px;">
                <div class="p-3">
                    <h3>{{ $channel->name }}</h3>
                    <p>{{ short_number($channel->subscribers()) }} subscriber {{ $channel->videos->count() }} video</p>
                    <div class="d-flex align-items-center">
                        <a href="" class="text-decoration-none">
                            <span>{{ Str::words($channel->description, 20, '...') }}</span>
                        </a>
                        @if (!is_null($channel->description))
                            <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">chevron_right</i>
                        @endif
                    </div>
                </div>
            </div>
            <div>
                @can('update', $channel)
                    <a href="{{ route('channel.edit', $channel) }}" class="btn btn-primary">Edit Channel</a>
                @endcan
            </div>
        </div>
        <hr>
        <div class="row my-5">
            @foreach ($channel->videos as $video)
                <div class="col-md-3">
                    <div class="card mb-4" style="border:none; background: none;">
                        <a href="{{ route('video.watch', $video) }}">
                            <div class="position-relative">
                                <img src="{{ asset($video->thumbnail) }}" alt="{{ $video->title }}" style="height: 100%; width: 333px;">
                                <div class="badge bg-secondary position-absolute" style="bottom: 8px; right: 16px;">
                                    {{ $video->duration }}
                                </div>
                            </div>
                        </a>
                        <div class="row my-3">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('video.watch', $video)}}" class="text-decoration-none">
                                    <span class="text-black" data-bs-toggle="tooltip" title="{{ $video->title }}">{{ Str::words($video->title, 4, '...') }} </span>
                                </a>
                            </div>
                            <div class="d-flex mt-2 flex-column">
                                <p class="gray-text font-weight-bold" style="line-height: 0.2px">{{ short_number($video->views) }} x ditonton • {{ $video->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection