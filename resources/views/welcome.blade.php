@extends('layouts.app')
@section('title', isset($title) ? $title : 'Beranda - Youtube Cloning')
@push('custom-css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2" x-show="sidebar" x-trap="sidebar" x-transition>
            @include('includes.sidebar')
        </div>
        <div class="col-md-10" id="content">
            @livewire('home.all-video')
        </div>
    </div>
</div>
@endsection
@push('scripts')
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
            tooltip.innerHTML = copyText.value;
        }

        function outFunc() {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Salin link";
        }
    </script>
@endpush