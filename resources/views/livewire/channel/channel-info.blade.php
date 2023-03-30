<div class="my-5">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ $channel->picture }}" class="rounded-circle" height="130px;" width="130px;">
            <div class="ml-2">
                <h4>{{ $channel->name }}</h4>
                <p class="gray-text">{{ $channel->subscribers() }} subscribers</p>
            </div>
        </div>
        <div>
            <button wire:click.prevent="toggle" class="btn btn-md text-uppercase {{ $userSubscribed ? 'sub-btn-active' : 'sub-btn' }}">
                {{ $userSubscribed ? 'Subscribed' : 'Subscribe' }}
            </button>
        </div>
    </div>
</div>
