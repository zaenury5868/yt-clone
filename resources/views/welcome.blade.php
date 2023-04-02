@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        @if (!$channels->count())
            <p>Anda tidak berlangganan ke channel mana pun</p>
        @endif
        @foreach ($channels as $channelVideos)
            @foreach ($channelVideos as $video)
                <div class="col-md-3">
                    <div class="card mb-4" style="border:none;">
                        <a href="{{ route('video.watch', $video)}}">
                            <img class="card-img-top" src="{{asset( $video->thumbnail)}}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('video.watch', $video)}}" class="text-decoration-none">
                                    <h4 class="text-black">{{ Str::words($video->title, 4, '...') }} </h4>
                                </a>
                            </div>
                            <div class="d-flex mt-4 flex-column">
                                <p class="gray-text font-weight-bold" style="line-height: 0.2px">
                                    {{ $video->channel->name}}
                                </p>
                                <p class="gray-text font-weight-bold" style="line-height: 0.2px">{{ $video->views}}x ditonton • {{$video->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection