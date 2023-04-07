@extends('layouts.app')
@push('custom-css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endpush
@section('content')
<div class="container">
    @livewire('home.all-video')
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
            tooltip.innerHTML = "Copied: " + copyText.value;
        }

        function outFunc() {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copy to clipboard";
        }
    </script>
@endpush