@extends('layouts.app')

@section('content')
    <div class="p-10 rounded-lg bg-primary">
        <div class="container">
            <h1 class="display-4 text-white">{{$channel->name}}</h1>
            <p class="lead text-white">{{$channel->description}}</p>
        </div>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ $channel->picture }}" class="rounded-circle" height="130px;" width="130px;">
                <div class="p-3">
                    <h3>{{$channel->name}}</h3>
                    {{-- <p>{{ $channel->subscribers() }} Subscribers</p> --}}
                </div>
            </div>
            <div>
                @can('update', $channel)
                    <a href="{{route('channel.edit', $channel)}}" class="btn btn-primary">Edit Channel</a>
                @endcan
            </div>
        </div>
        <div class="row my-5">
            @foreach ($channel->videos as $video)
                <div class="col-md-3">
                    <div class="card mb-4" style="border:none;">
                        <a href="{{ route('video.watch', $video)}}">
                            <img class="card-img-top" src="{{asset( $video->thumbnail)}}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('/images/' . $video->channel->image)}}" height="40px" class="rounded circle">
                                <a href="{{ route('video.watch', $video)}}" class="text-decoration-none">
                                    <h4 class="p-3">{{$video->title}}</h4>
                                </a>
                            </div>
                            <div class="d-flex mt-4 flex-column">
                                <p class="text-gray font-weight-bold" style="line-height: 0.2px">
                                    {{ $video->channel->name}}
                                </p>
                                <p class="text-gray font-weight-bold" style="line-height: 0.2px">{{ $video->views}}x ditonton • {{$video->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection