<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @stack('custom-css')
    <!-- material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- alpine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class=" navbar navbar-expand-md navbar-light shadow-sm" style="box-shadow: none !important;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('video.all', auth()->user()->channel) }}" class="nav-link">Semua Video</a>
                            </li>
                        @endauth
                    </ul>
                    <div class="m-auto w-50">
                        <form action="{{ route('search') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="search_query" class="form-control fw-semibold form-control-search" placeholder="Telusuri">
                                <button type="submit" class="input-group-text search-btn text-black-50"><i class="material-icons">search</i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2 fw-semibold" style="background-color: #f1f1f1; padding: .5rem 1rem .5rem 1rem; border-radius: 1rem;" href="{{ route('login') }}">
                                        <span class="material-icons">account_circle</span>
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
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
                                    <a href="{{ route('channel.index', ['channel' => Auth::user()->channel])}}" class="dropdown-item pb-3 fw-semibold text-black-50 text-capitalize d-flex align-items-center">
                                        <div class="material-icons" style="margin-right: 0.75rem; font-size: 20px;">account_box</div>channel anda
                                    </a>
                                    <a href="{{ route('video.subscription') }}" class="dropdown-item pb-3 fw-semibold text-black-50 text-capitalize d-flex align-items-center">
                                        <div class="material-icons" style="margin-right: 0.75rem; font-size: 20px;">subscriptions</div>youtube studio
                                    </a>
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
