<div class="my-5">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('/images/' . $channel->image) }}" class="rounded-circle">
            <div class="ml-2">
                <h4>{{ $channel->name }}</h4>
                <p class="gray-text">10 subscribers</p>
            </div>
        </div>
        <div>
            <button class="btn btn-lg text-uppercase btn-secondary">subscribe</button>
        </div>
    </div>
</div>
