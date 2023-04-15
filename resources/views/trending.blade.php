@extends('layouts.app')
@section('title', isset($title) ? $title : 'Trending - Youtube Cloning')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2" x-show="sidebar" x-trap="sidebar" x-transition>
            @include('includes.sidebar')
        </div>
        <div class="col-md-10" id="content">
            <div class="container-xxl">
                <div class="d-flex align-items-center my-4 gap-3">
                    <img src="https://www.youtube.com/img/trending/avatar/trending.png" alt="trending" class="rounded-circle" height="70" width="70">
                    <h1 class="text-capitalize fw-semibold h4">trending</h1>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold active gray-text text-uppercase" style="font-size: 12px;" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            sekarang
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold gray-text text-uppercase" style="font-size: 12px;" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">
                            Videos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold gray-text text-uppercase" style="font-size: 12px;" id="channels-tab" data-bs-toggle="tab" data-bs-target="#channels" type="button" role="tab" aria-controls="channels" aria-selected="false">
                            Channels</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold gray-text text-uppercase" style="font-size: 12px;" id="playlists-tab" data-bs-toggle="tab" data-bs-target="#playlists" type="button" role="tab" aria-controls="playlists" aria-selected="false">
                            Playlists</button>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-md-8">
                            <div class="card mb-2 border-0" style="background: none;">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="" class="text-decoration-none">
                                            <div class="position-relative">
                                                <img src="{{ asset('/images/' . 'default.jpg') }}" alt="gfh" height="auto" width="200" class="img-fluid" style="border-radius: .75rem">
                                                <div class="badge bg-secondary position-absolute" style="bottom: 8px; right: 16px;">
                                                    43646
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-1">
                                            <a href="" class="text-decoration-none">
                                                <h4 class="text-black">yityiy</h4>
                                            </a>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="gray-text font-weight-bold" style="line-height: 0.2px">
                                                <a href="" class="text-decoration-none">
                                                    <span class="gray-text font-weight-bold">channel</span>
                                                </a>
                                                20 x ditonton • 54745
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p class="text-muted">
                                                {{ Str::words('lorem', 8, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                        <h3>Videos tab content goes here</h3>
                        <p>Nulla euismod, urna ac interdum finibus, sapien dolor ultrices massa, id vestibulum turpis metus in nisi.</p>
                    </div>
                    <div class="tab-pane fade" id="channels" role="tabpanel" aria-labelledby="channels-tab">
                        <h3>Channels tab content goes here</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, urna ac interdum finibus, sapien dolor ultrices massa, id vestibulum turpis metus in nisi.</p>
                    </div>
                    <div class="tab-pane fade" id="playlists" role="tabpanel" aria-labelledby="playlists-tab">
                        <h3>Playlists tab content goes here</h3>
                        <p>Nulla euismod, urna ac interdum finibus, sapien dolor ultrices massa, id vestibulum turpis metus in nisi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection