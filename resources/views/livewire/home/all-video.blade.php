<div wire:init="loadCardData">
    <div class="row my-4">
        @if (!$totalRecords)
            <h1 class="text-danger text-center mt-4">Tidak ada video</h1>
        @else
            <div class="row justify-content-center">
                <div class="items d-flex mb-4 w-50" style="gap: 20px; overflow-x: scroll; overflow-y: hidden;">
                    <button class="btn text-capitalize btn-secondary">semua</button>
                    <button class="btn text-capitalize btn-secondary">programming</button>
                    <button class="btn text-capitalize btn-secondary">musik</button>
                    <button class="btn text-capitalize btn-secondary">tips</button>
                    <button class="btn text-capitalize btn-secondary">baru diupload</button>
                    <button class="btn text-capitalize btn-secondary">ditonton</button>
                </div>
            </div>
        @endif
        @isset($videos)
            @foreach ($videos as $video)
                <div @if($loop->last) id="last_record" @endif class="col-md-4">
                    <div class="card mb-4" style="border:none; background: none !important;">
                        @include('includes.videoThumbnail')
                        <div class="d-flex mt-3">
                            <a href="{{ route('channel.index', ['channel' => $video->channel->name]) }}" style="margin-right: 1rem;">
                                <img src="{{ $video->channel->picture }}" class="rounded-circle" height="40" width="40">
                            </a>
                            <div class="row">
                                <div class="d-flex">
                                    <a href="{{ route('video.watch', ['v' => $video]) }}" class="text-decoration-none">
                                        <span class="text-black" data-bs-toggle="tooltip" title="{{ $video->title }}">{{ Str::words($video->title, 6, '...') }} </span>
                                    </a>
                                    <div class="ms-auto">
                                        <button class="text-decoration-none btn" wire:click.prevent="detailVideo({{ $video->id }})">
                                            <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">more_vert</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex mt-3 flex-column">
                                    <p class="d-flex gray-text font-weight-bold align-items-center" style="line-height: 0.2px">
                                        <a href="{{ route('channel.index', ['channel' => $video->channel->name]) }}" class="text-decoration-none">
                                            {{ $video->channel->name }}
                                        </a>
                                        <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">check_circle</i>
                                    </p>
                                    <p class="gray-text font-weight-bold" style="line-height: 0px">{{ short_number($video->views) }} x ditonton • {{$video->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content" style="border-radius: 1rem">
                        <header class="w3-container py-4"> 
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <span class="text-capitalize fw-semibold">bagikan</span>
                        </header>
                        <div class="w3-container">
                            <div class="input-group tool-text"> 
                                <input type="text" id="copy" class="form-control p-2" wire:model="uid">
                                <button type="submit" class="input-group-text search-btn text-capitalize" onclick="copyLink()" onmouseout="outFunc()">
                                    <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                    salin</button> 
                            </div>
                            <hr class="pt-4">
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @if($videos->hasMorePages())
                <button wire:click.prevent="loadMore">Load more</button>
            @endif --}}
            <script>
                const lastRecord = document.getElementById('last_record')
                const options = {
                    root: null,
                    threshold: 1,
                    rootMargin: '0px'
                }

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if(entry.isIntersecting) {
                            @this.loadMore()
                        }
                    })
                })
                observer.observe(lastRecord)
            </script>
        @else
            <h1 class="text-danger text-center mt-4 text-capitalize">loading...</h1>
        @endisset
    </div>
</div>
