<div class="d-flex my-4 flex-column gy-3 position-sticky max-h-500">
    <a href="{{ url('/') }}" class="text-decoration-none @if(Route::current()->getName() == 'home') sb-active fw-bold text-black @else fw-semibold @endif d-flex mb-3 align-items-center gap-4">
        <span class="material-icons">home</span>
        <span class="text-upperfirst">beranda</span>
    </a>
    <a href="{{ route('video.trending') }}" class="text-decoration-none @if(Route::current()->getName() == 'video.trending') sb-active fw-bold text-black @else fw-semibold @endif d-flex mb-3 align-items-center gap-4">
        <span class="material-icons">local_fire_department</span>
        <span class="text-upperfirst">trending</span>
    </a>
    <a href="{{ route('video.subscription') }}" class="text-decoration-none @if(Route::current()->getName() == 'video.subscription') sb-active fw-bold text-black @else fw-semibold @endif d-flex mb-3 align-items-center gap-4">
        <span class="material-icons">subscriptions</span>
        <span class="text-upperfirst">subscription</span>
    </a>
    <hr>
    @guest
    <p class="text-upperfirst text-black-50 fw-semibold px-2">
        login untuk memberi tanda suka pada video, memberi komentar, dan subscribe.
    </p>
    <a class="d-flex justify-content-center align-items-center gap-2 fw-semibold text-black-50 text-decoration-none mx-2" style="background-color: #f1f1f1; padding: .5rem 1rem .5rem 1rem; border-radius: 1rem;" href="{{ route('login') }}">
        <span class="material-icons">account_circle</span>
        {{ __('Login') }}
    </a>
    @else
        <a href="{{ route('video.history') }}" class="text-decoration-none @if(Route::current()->getName() == 'video.history') sb-active fw-bold text-black @else fw-semibold @endif d-flex mb-3 align-items-center gap-4">
            <span class="material-icons">history</span>
            <span class="text-upperfirst">history</span>
        </a>
        <a href="{{ route('video.all', auth()->user()->channel) }}" class="text-decoration-none @if(Route::current()->getName() == 'video.all') sb-active fw-bold text-black @else fw-semibold @endif d-flex mb-3 align-items-center gap-4">
            <span class="material-icons">smart_display</span>
            <span class="text-upperfirst">video anda</span>
        </a>
        <a href="{{ route('video.like') }}" class="text-decoration-none @if(Route::current()->getName() == 'video.like') sb-active fw-bold text-black @else fw-semibold @endif d-flex mb-3 align-items-center gap-4">
            <span class="material-icons">thumb_up</span>
            <span class="text-upperfirst">video yang disukai</span>
        </a>
        <hr>
        <span class="fw-semibold h5 text-upperfirst text-black-50">subscription</span>
        <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
            <img src="{{ asset('/images/' . 'default.jpg') }}" class="rounded-circle" height="35" width="35">
            <span class="text-upperfirst">{{ Str::limit('6 Pack Programmer top', 20, '...') }}</span>
        </a>
        <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
            <img src="{{ asset('/images/' . 'default.jpg') }}" class="rounded-circle" height="35" width="35">
            <span class="text-upperfirst">{{ Str::limit('6 Pack Programmer top', 20, '...') }}</span>
        </a>
        <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
            <img src="{{ asset('/images/' . 'default.jpg') }}" class="rounded-circle" height="35" width="35">
            <span class="text-upperfirst">{{ Str::limit('6 Pack Programmer top', 20, '...') }}</span>
        </a>
        <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
            <img src="{{ asset('/images/' . 'default.jpg') }}" class="rounded-circle" height="35" width="35">
            <span class="text-upperfirst">{{ Str::limit('6 Pack Programmer top', 20, '...') }}</span>
        </a>
        <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
            <img src="{{ asset('/images/' . 'default.jpg') }}" class="rounded-circle" height="35" width="35">
            <span class="text-upperfirst">{{ Str::limit('6 Pack Programmer top', 20, '...') }}</span>
        </a>
        <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
            <img src="{{ asset('/images/' . 'default.jpg') }}" class="rounded-circle" height="35" width="35">
            <span class="text-upperfirst">{{ Str::limit('6 Pack Programmer top', 20, '...') }}</span>
        </a>
        <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
            <img src="{{ asset('/images/' . 'default.jpg') }}" class="rounded-circle" height="35" width="35">
            <span class="text-upperfirst">{{ Str::limit('6 Pack Programmer top', 20, '...') }}</span>
        </a>
    @endguest
    <hr>
    <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
        <span class="material-icons">settings</span>
        <span class="text-upperfirst">setelan</span>
    </a>
    <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
        <span class="material-icons">flag</span>
        <span class="text-upperfirst">histori laporan</span>
    </a>
    <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
        <span class="material-icons">help</span>
        <span class="text-upperfirst">bantuan</span>
    </a>
    <a href="" class="text-decoration-none fw-semibold d-flex mb-3 align-items-center gap-4">
        <span class="material-icons">chat_bubble</span>
        <span class="text-upperfirst">kirim masukan</span>
    </a>
    <hr>
    <p class=" text-upperfirst text-black-50 fw-semibold">
        website ini merupakan cloningan youtube. kemiripan fungsionalitas pada website ini sebesar 50% termasuk desain dan backend. 
    </p>
    <p class=" text-upperfirst text-black-50 fw-semibold">
        youtube-clone ini dibangun menggunakan laravel 10 dan livewire serta support beberapa library dan package.
    </p>
    <p class="text-capitalize text-black-50 fw-semibold">&copy; <script>document.write(new Date().getFullYear())</script> zaenury dhany wibowo</p>
</div>