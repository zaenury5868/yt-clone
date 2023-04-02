@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <button class="btn text-capitalize fw-semibold">
                    <i class="material-icons">tune</i>
                </button>
                <hr>
                <div class="space-y">
                    @foreach ($videos as $video)
                        <div class="card border-0" style="background: none;">
                            <div class="row">
                                <img src="{{ asset($video->thumbnail) }}" alt="" style="height: 100%; width: 333px;">
                                <div class="col">
                                    <div class="row">
                                        <a href="{{ route('video.watch', $video)}}" class="text-decoration-none">
                                            <h4 class="text-black">{{ $video->title }} </h4>
                                        </a>
                                    </div>
                                    <div class="row">
                                        <p class="gray-text font-weight-bold" style="line-height: 0.2px">
                                            {{ $video->channel->name}}
                                        </p>
                                        <p class="gray-text font-weight-bold" style="line-height: 0.2px">{{ $video->views}}x ditonton • {{$video->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div class="row my-3">
                                        <div class="d-flex align-items-center">
                                            <a href="" class="text-decoration-none">
                                                <img src="{{ asset('/images/' . $video->channel->image) }}" class="rounded-circle" alt="" width="30" style="margin-right: 8px">
                                                <span class="gray-text font-weight-bold">
                                                    {{ $video->channel->name }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <a href="{{ route('video.watch', $video)}}" class="text-decoration-none">
                                            <p class="text-truncate">
                                                {{ Str::words($video->description, 8, '...') }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
