<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nikmati video dan musik yang Anda suka, upload konten asli, dan bagikan kepada teman, keluarga, dan dunia di YouTube Cloning.">
    <meta name="keywords" content="video, berbagi, ponsel kamera, ponsel video, gratis, upload">
    <meta name="author" content="Zaenury Dhany Wibowo">
    <meta name="robots" content="index,follow">
    <meta name="theme-color" content="rgba(33, 33, 33, 0.98)">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icon -->
    <link rel="shortcut icon" href="https://www.youtube.com/s/desktop/932eb6a8/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://www.youtube.com/s/desktop/932eb6a8/img/favicon_32x32.png" sizes="32x32"/>
    <link rel="apple-touch-icon" href="https://www.youtube.com/s/desktop/932eb6a8/img/favicon_48x48.png" sizes="48x48"/>
    <link rel="apple-touch-icon" href="https://www.youtube.com/s/desktop/932eb6a8/img/favicon_144x144.png" sizes="144x144"/>

    @stack('custom-css')
    <!-- CSRF Token -->
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    @livewireStyles
</head>
<body>
    <div x-data="{sidebar: true}" x-intersect="sidebar=true" id="app" x-init="
        $watch('sidebar', value => { 
            console.log(value);
            const element = document.querySelector('#content'); 
            if (value) { 
                element.classList.remove('col-md-12'); 
                element.classList.add('col-md-10'); 
            } else { 
                element.classList.add('col-md-12'); 
                element.classList.remove('col-md-10'); 
            } 
        })">
        <nav class=" navbar navbar-expand-md navbar-light sticky-top bg-white shadow-sm" style="box-shadow: none !important;">
            <div class="container">
                <div class="d-flex align-items-center gap-4">
                    <button class="btn" type="button" @click="sidebar= !sidebar" id="toggle" style="padding: 0; border: none;"> 
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand fw-semibold" href="{{ url('/') }}">
                        {{ config('app.name', 'Youtube Cloning') }}
                        <h1 hidden>landing page {{ config('app.name', 'Youtube Cloning') }}</h1>
                    </a>
                </div>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
                <div class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <div x-data="{search: false}" x-intersect="shown=true"  class="m-auto w-50 position-relative">
                        <form action="{{ route('video.search') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="search_query" @click="search= !search" class="form-control fw-semibold form-control-search" placeholder="Telusuri">
                                <button type="submit" class="input-group-text search-btn text-black-50"><i class="material-icons">search</i></button>
                            </div>
                        </form>
                        <div x-show="search" x-trap="search" class="card my-2 position-absolute history-search" style="border-radius: .75rem; z-index: 1;">
                            <div class="card-body search-btn for-search">
                                <div class="d-flex my-2 justify-content-between">
                                    <a href="" class="text-decoration-none fw-semibold">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="material-icons text-black-50">history</i>
                                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                        </div>
                                    </a>
                                    <a href="" class="text-capitalize fw-semibold text-decoration-none text-black-50">hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="auth/google/redirect" class="nav-link d-flex align-items-center text-black-50 gap-2 fw-semibold" style="background-color: #f1f1f1; padding: .5rem 1rem .5rem 1rem; border-radius: 1rem;">
                                        <span class="material-icons">account_circle</span>
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ route('video.create', ['channel' => Auth::user()->channel]) }}" class="nav-link">
                                    <span class="material-icons">video_call</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="nav-link" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="material-icons position-relative">notifications</span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="width: 600px; border-radius: 0.75rem;">
                                    <div class="dropdown-item text-decoration-none d-flex align-items-center gap-3">
                                        <span class="text-upperfirst text-black-50 fw-semibold">notifikasi</span>
                                    </div>
                                    <hr>
                                    <div class="dropdown-item text-decoration-none my-2">
                                        <div class="d-flex w-100 justify-content-between">
                                            <a href="" class="text-decoration-none">
                                                <div class="d-flex gap-3">
                                                    <img src="{{ auth()->user()->channel->picture }}" class="rounded-circle" height="50" width="50">
                                                    <div class="d-flex flex-column">
                                                        <p class="text-upperfirst fw-semibold h6 text-bold" data-bs-toggle="tooltip" title="dfghfgh">pancen mengupload : {{ Str::words('What is Kali Linux | Kali Linux Hacking Kali Linux Hacking Kali Linux Hacking Kali Linux Hacking', 10, '...') }}</p>
                                                        <small class="text-upperfirst fw-semibold text-black-50">1 menit lalu</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="" class="text-decoration-none">
                                                <span class="material-icons text-black-50">more_vert</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ auth()->user()->channel->picture }}" class="avatar avatar-md rounded-circle" height="30" width="30">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="width: 250px; border-radius: 0.75rem;">
                                    <div class="dropdown-item text-decoration-none d-flex align-items-center gap-3">
                                        <img src="{{ auth()->user()->channel->picture }}" class="rounded-circle" height="35" width="35">
                                        <div class="d-flex flex-column text-black-50 fw-semibold">
                                            <span class="text-upperfirst">{{ auth()->user()->channel->name }}</span>
                                            <span class="text-upperfirst">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="{{ route('video.channel.index', ['channel' => Auth::user()->channel])}}" class="dropdown-item pb-3 fw-semibold text-black-50 text-capitalize d-flex align-items-center">
                                        <div class="material-icons" style="margin-right: 0.75rem; font-size: 20px;">account_box</div>channel anda
                                    </a>
                                    {{-- <a href="{{ route('video.all', auth()->user()->channel) }}" class="dropdown-item pb-3 fw-semibold text-black-50 text-capitalize d-flex align-items-center">
                                        <div class="material-icons" style="margin-right: 0.75rem; font-size: 20px;">subscriptions</div>youtube studio
                                    </a> --}}
                                    <a class="dropdown-item fw-semibold text-black-50 d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="material-icons" style="margin-right: 0.75rem; font-size: 20px;">input</div> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    @stack('scripts')
    @livewireScripts
</body>
</html>
