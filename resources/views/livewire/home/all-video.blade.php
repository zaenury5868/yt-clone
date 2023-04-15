@push('custom-css')
    <!-- Open Graph meta tags for social media -->
    <meta property="og:title" content="Beranda - Youtube Cloning">
    <meta property="og:description" content="Nikmati video dan musik yang Anda suka, upload konten asli, dan bagikan kepada teman, keluarga, dan dunia di YouTube Cloning.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::full() }}">
    <meta property="og:image" content="https://www.youtube.com/img/desktop/yt_1200.png">
    <meta property="og:image:height" content="300" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:alt" content="Youtube Cloning">
    <meta property="og:locale" content="id_ID" />
    <meta property="og:site_name" content="Youtube Cloning" />
    <meta property="og:country-name" content="{{ str_replace('_', '-', app()->getLocale()) }}"/>
    <meta property="article:publisher" content="https://www.facebook.com/zaenury5868" />

    
    <!-- Twitter Card meta tags for social media -->
    <meta property="twitter:domain" content="{{ Request::getHost() }}">
    <meta property="twitter:site" content="@ZaenuryWibowo">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ URL::full() }}">
    <meta property="twitter:title" content="Beranda - Youtube Cloning">
    <meta property="twitter:description" content="Nikmati video dan musik yang Anda suka, upload konten asli, dan bagikan kepada teman, keluarga, dan dunia di YouTube Cloning.">
    <meta property="twitter:image" content="https://www.youtube.com/img/desktop/yt_1200.png">
    <meta property="twitter:label1" content="Official Youtube Cloning" />
    
    <!-- Canonical link tag -->
    <link rel="canonical" href="{{ URL::full() }}">

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
            <div class="d-flex align-items-center justify-content-center" style="height: 600px">
                <h1 class="text-danger text-center mt-4">Tidak ada video</h1>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="items d-flex mb-4 w-100" style="gap: 20px; overflow-x: scroll; overflow-y: hidden;">
                    <button class="btn text-capitalize btn-secondary filter-video border-sm"><h2 class="h6 text-black-50">semua</h2></button>
                    <button class="btn text-capitalize btn-secondary filter-video border-sm"><h2 class="h6 text-black-50">teknologi</h2></button>
                    <button class="btn text-capitalize btn-secondary filter-video border-sm"><h2 class="h6 text-black-50">musik</h2></button>
                    <button class="btn text-capitalize btn-secondary filter-video border-sm"><h2 class="h6 text-black-50">programming</h2></button>
                    <button class="btn text-capitalize btn-secondary filter-video border-sm"><h2 class="h6 text-black-50">baru diupload</h2></button>
                    <button class="btn text-capitalize btn-secondary filter-video border-sm"><h2 class="h6 text-black-50">ditonton</h2></button>
                </div>
            </div>
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
                                <a href="{{ route('video.channel.index', ['channel' => $video->channel->slug]) }}" class="mr-2">
                                    <img src="{{ $video->channel->picture }}" loading="lazy" class="rounded-circle" height="40" width="40" alt="{{ $video->channel->name }}" title="{{ $video->channel->name }}">
                                </a>
                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('video.watch', ['v' => $video]) }}" class="text-decoration-none">
                                            <h3 class="text-black h6" data-bs-toggle="tooltip" title="{{ $video->title }}">
                                                {{ Str::words($video->title, 6, '...') }} 
                                            </h3>
                                        </a>
                                            <button class="text-decoration-none btn" wire:click.prevent="detailVideo({{ $video->id }})">
                                                <i class="material-icons" style="font-size: 1rem; margin-left: 0.2rem;">more_vert</i>
                                            </button>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="d-flex gray-text font-weight-bold align-items-center" style="line-height: 0.2px">
                                            <a href="{{ route('video.channel.index', ['channel' => $video->channel->slug]) }}" class="text-decoration-none">
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
                            <span class="text-capitalize text-black">bagikan</span>
                        </header>
                        <div class="w3-container m-auto">
                            <div class="d-flex justify-content-center">
                                <div class="social-media gap-3-half">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $uid }}" class="social-media-btn text-upperfirst" target="__blank">
                                        <i class="fa fa-facebook-official"></i>
                                        <p class="text-black text-social text-upperfirst" style="font-size: .75rem !important">facebook</p>
                                    </a>
                                    <a href="https://twitter.com/share?&url={{ $uid }}&text={{ $title }}" class="social-media-btn" target="__blank">
                                        <i class="fa fa-twitter"></i>
                                        <p class="text-black text-social text-upperfirst" style="font-size: .75rem !important">twitter</p>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $uid }}" class="social-media-btn" target="__blank">
                                        <i class="fa fa-linkedin"></i>
                                        <p class="text-black text-social text-upperfirst" style="font-size: .75rem !important">linkedin</p>                                    
                                    </a>
                                    <a href="https://www.reddit.com/submit?url={{ $uid }}&title={{ $title }}" class="social-media-btn" target="__blank">
                                        <i class="fa fa-reddit"></i>
                                        <p class="text-black text-social text-upperfirst" style="font-size: .75rem !important">reddit</p>                                    
                                    </a>
                                    <a href="mailto:?subject={{ $title }}&amp;body={{ $uid }}" class="social-media-btn" target="__blank">
                                        <i class="fa fa-envelope"></i>
                                        <p class="text-black text-social text-upperfirst" style="font-size: .75rem !important">email</p>                                    
                                    </a>
                                    <a href="https://pinterest.com/pin/create/button/?url={{ $uid }}&description={{ $description }}" class="social-media-btn" target="__blank">
                                        <i class="fa fa-pinterest"></i>
                                        <p class="text-black text-social text-upperfirst" style="font-size: .75rem !important">pinterest</p>                                    
                                    </a>
                                    <a href="https://wa.me/?text={{ $uid }}" class="social-media-btn" target="__blank">
                                        <i class="fa fa-whatsapp"></i>
                                        <p class="text-black text-social text-upperfirst" style="font-size: .75rem !important">whatsapp</p>                                    
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
        @endif
    </div>
</div>
