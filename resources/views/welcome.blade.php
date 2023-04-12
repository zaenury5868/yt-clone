@extends('layouts.app')
@section('title', isset($title) ? $title : 'Beranda - Youtube Cloning')
@push('custom-css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('includes.sidebar')
        </div>
        <div class="col-md-10">
            @livewire('home.all-video')
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script>
        window.addEventListener('showdetailModal', function(event) {
            document.getElementById('id01').style.display='block'
        });

        function copyLink() {
            var copyText = document.getElementById("copy");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copied: " + copyText.value;
        }

        function outFunc() {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copy to clipboard";
        }
    </script>
@endpush