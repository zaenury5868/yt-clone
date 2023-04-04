@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        @if (!$videos->count())
            <h1 class="text-danger text-center mt-4">Tidak ada video</h1>
        @endif
        @foreach ($videos as $video)
            <div class="col-md-4">
                <div class="card mb-4" style="border:none; background: none !important;">
                    @include('includes.videoThumbnail')
                    <div class="d-flex mt-3">
                        <a href="{{ route('channel.index', ['channel' => $video->channel->name]) }}" style="margin-right: 1rem;">
                            <img src="{{ $video->channel->picture }}" class="rounded-circle" height="40" width="40">
                        </a>
                        <div class="row">
                            <div class="d-flex">
                                <a href="{{ route('video.watch', $video)}}" class="text-decoration-none">
                                    <span class="text-black" data-bs-toggle="tooltip" title="{{ $video->title }}">{{ Str::words($video->title, 6, '...') }} </span>
                                </a>
                                <div class="ms-auto">
                                    <a href="" class="text-decoration-none">
                                        <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">more_vert</i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex mt-3 flex-column">
                                <p class="d-flex gray-text font-weight-bold align-items-center" style="line-height: 0.2px">
                                    <a href="{{ route('channel.index', ['channel' => $video->channel->name]) }}" class="text-decoration-none">
                                        {{ $video->channel->name }}
                                    </a>
                                    <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">check_circle</i>
                                </p>
                                <p class="gray-text font-weight-bold" style="line-height: 0px">{{ short_number($video->views) }} x ditonton • {{$video->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection