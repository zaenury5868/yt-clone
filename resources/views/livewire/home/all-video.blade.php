@push('custom-css')
    <!-- JSON-LD script -->
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@graph":[
                {
                    "@type": "WebPage",
                    "name": "Youtube Cloning",
                    "description": "In addition to Patrick's work in the SEO field, he also enjoys classical jazz dancing and organic farming ",
                    "publisher": {
                        "@type": "ProfilePage",
                        "name": "Youtube Cloning"
                    }
                },{
                    "@type": "BreadcrumbList",
                    "itemListElement": [{
                        "@type": "ListItem",
                        "position": 1,
                        "item": {
                            "@id": "https://example.com/books",
                            "name": "Beranda",
                            "image": "http://example.com/images/icon-book.png"
                        }
                    }]
                },{
                    "@type": "WebSite",
                    "name": "Youtube Cloning",
                    "url": "{{ URL::full() }}",
                    "potentialAction": {
                        "@type": "SearchAction",
                        "target": "{{ URL::full() }}/results?search_query={search_term}",
                        "query-input": "required name=search_term"
                    },
                    "inLanguage":"{{ str_replace('_', '-', app()->getLocale()) }}"
                },{
                    "@context": "https://schema.org",
                    "@type": "Organization",
                    "name": "Youtube Cloning",
                    "legalName" : "Youtube Cloning",
                    "url": "{{ URL::full() }}",
                    "logo": "http://cdn.elite-strategies.com/wp-content/uploads/2013/04/elitestrategies.png",
                    "foundingDate": "2023",
                    "founders": [{
                        "@type": "Person",
                        "name": "Zaenury Dhany Wibowo"
                    }],
                    "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "Cilacap",
                        "addressLocality": "Cilacap",
                        "addressRegion": "Cilacap",
                        "postalCode": "33444",
                        "addressCountry": "IDN"
                    },
                    "contactPoint": {
                        "@type": "ContactPoint",
                        "contactType": "customer support",
                        "telephone": "[+62 858-7614-8624]",
                        "email": "ichigozaenury@gmail.com"
                    },
                    "sameAs" : [
                        "https://www.facebook.com",
                        "https://twitter.com",
                        "https://plus.google.com",
                        "https://www.instagram.com/",
                        "https://www.youtube.com/",
                        "https://www.linkedin.com/"
                    ]
                }
            ]
        }
    </script>
@endpush
<div wire:init="loadCardData">
    <div class="row my-4">
        @if (!$totalRecords)
            <h1 class="text-danger text-center mt-4">Tidak ada video</h1>
        @else
            <div class="row justify-content-center">
                <div class="items d-flex mb-4 w-100" style="gap: 20px; overflow-x: scroll; overflow-y: hidden;">
                    <button class="btn text-capitalize btn-secondary filter-video fw-semibold text-black-50 border-sm">semua</button>
                    <button class="btn text-capitalize btn-secondary filter-video fw-semibold text-black-50 border-sm">teknologi</button>
                    <button class="btn text-capitalize btn-secondary filter-video fw-semibold text-black-50 border-sm">musik</button>
                    <button class="btn text-capitalize btn-secondary filter-video fw-semibold text-black-50 border-sm">tips</button>
                    <button class="btn text-capitalize btn-secondary filter-video fw-semibold text-black-50 border-sm">baru diupload</button>
                    <button class="btn text-capitalize btn-secondary filter-video fw-semibold text-black-50 border-sm">ditonton</button>
                </div>
            </div>
        @endif
        @if(empty($videos))
            @for ($i = 0; $i < 18; $i++)
                <div class="col-md-4">
                    <div class="card mb-4" style="border:none; background: none !important;">
                        <div class="position-relative skeleton">
                            <img class="img-fluid" style="border-radius: 0.75rem; height: 200px;">
                        </div>
                        <div class="d-flex mt-3">
                            <img class="rounded-circle skeleton" height="40" width="40" style="margin-right: 1rem;">
                            <div class="row">
                                <div class="d-flex justify-content-between skeleton skeleton-text"></div>
                                <div class="d-flex mt-3 flex-column">
                                    <p class="d-flex gray-text font-weight-bold align-items-center skeleton skeleton-text" style="line-height: 0.2px"></p>
                                    <p class="gray-text font-weight-bold skeleton skeleton-text" style="line-height: 0px"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        @else
            @foreach ($videos as $video)
                <div @if($loop->last) id="last_record" @endif class="col-md-4">
                    <div class="card mb-4" style="border:none; background: none !important;">
                        @include('includes.videoThumbnail')
                        <div class="d-flex mt-3">
                            <a href="{{ route('video.channel.index', ['channel' => $video->channel->name]) }}" class="mr-2">
                                <img src="{{ $video->channel->picture }}" class="rounded-circle" height="40" width="40">
                            </a>
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('video.watch', ['v' => $video]) }}" class="text-decoration-none">
                                        <span class="text-black" data-bs-toggle="tooltip" title="{{ $video->title }}">
                                            {{ Str::words($video->title, 6, '...') }} 
                                        </span>
                                    </a>
                                        <button class="text-decoration-none btn" wire:click.prevent="detailVideo({{ $video->id }})">
                                            <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">more_vert</i>
                                        </button>
                                </div>
                                <div class="d-flex flex-column">
                                    <p class="d-flex gray-text font-weight-bold align-items-center" style="line-height: 0.2px">
                                        <a href="{{ route('video.channel.index', ['channel' => $video->channel->name]) }}" class="text-decoration-none">
                                            {{ $video->channel->name }}
                                        </a>
                                        <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">check_circle</i>
                                    </p>
                                    <p class="gray-text font-weight-bold" style="line-height: 0px">{{ short_number($video->views) }} x ditonton • {{ $video->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content" style="border-radius: 1rem">
                    <header class="w3-container pt-4"> 
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <span class="text-capitalize text-black-50 fw-semibold">bagikan</span>
                    </header>
                    <div class="w3-container m-auto">
                        <div class="d-flex justify-content-center">
                            <div class="social-media gap-3-half">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $uid }}" class="social-media-btn text-upperfirst" target="__blank">
                                    <i class="fa fa-facebook-official"></i>
                                    <p class="text-black-50 fw-semibold text-social text-upperfirst" style="font-size: .75rem !important">facebook</p>
                                </a>
                                <a href="https://twitter.com/share?&url={{ $uid }}&text={{ $title }}" class="social-media-btn" target="__blank">
                                    <i class="fa fa-twitter"></i>
                                    <p class="text-black-50 fw-semibold text-social text-upperfirst" style="font-size: .75rem !important">twitter</p>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $uid }}" class="social-media-btn" target="__blank">
                                    <i class="fa fa-linkedin"></i>
                                    <p class="text-black-50 fw-semibold text-social text-upperfirst" style="font-size: .75rem !important">linkedin</p>                                    
                                </a>
                                <a href="https://www.reddit.com/submit?url={{ $uid }}&title={{ $title }}" class="social-media-btn" target="__blank">
                                    <i class="fa fa-reddit"></i>
                                    <p class="text-black-50 fw-semibold text-social text-upperfirst" style="font-size: .75rem !important">reddit</p>                                    
                                </a>
                                <a href="mailto:?subject={{ $title }}&amp;body={{ $uid }}" class="social-media-btn" target="__blank">
                                    <i class="fa fa-envelope"></i>
                                    <p class="text-black-50 fw-semibold text-social text-upperfirst" style="font-size: .75rem !important">email</p>                                    
                                </a>
                                <a href="https://pinterest.com/pin/create/button/?url={{ $uid }}&media={{ $video->channel->picture }}&description={{ $description }}" class="social-media-btn" target="__blank">
                                    <i class="fa fa-pinterest"></i>
                                    <p class="text-black-50 fw-semibold text-social text-upperfirst" style="font-size: .75rem !important">pinterest</p>                                    
                                </a>
                                <a href="https://wa.me/?text={{ $uid }}" class="social-media-btn" target="__blank">
                                    <i class="fa fa-whatsapp"></i>
                                    <p class="text-black-50 fw-semibold text-social text-upperfirst" style="font-size: .75rem !important">whatsapp</p>                                    
                                </a>
                            </div>
                        </div>
                        <div class="input-group my-4 tool-text"> 
                            <input type="text" id="copy" class="form-control p-2" wire:model="uid">
                            <button type="submit" class="input-group-text search-btn text-capitalize" onclick="copyLink()" onmouseout="outFunc()">
                                <span class="tooltiptext" id="myTooltip">salin link</span>
                                salin</button> 
                        </div>
                        <hr class="pt-4">
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
