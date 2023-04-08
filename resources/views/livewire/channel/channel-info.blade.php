<div class="my-2">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ $channel->picture }}" class="rounded-circle" height="80px;" width="80px;">
            <a href="{{ route('channel.index', ['channel' => $channel->name]) }}" class="text-decoration-none">
                <div class="ml-2">
                    <h4>{{ $channel->name }}</h4>
                    <p class="gray-text">{{ $channel->subscribers() }} subscribers</p>
                </div>
            </a>
        </div>
        <div>
            <button wire:click.prevent="toggle" class="btn btn-md text-uppercase {{ $userSubscribed ? 'sub-btn-active' : 'sub-btn' }}" style="border-radius: .75rem;">
                {{ $userSubscribed ? 'Subscribed' : 'Subscribe' }}
            </button>
        </div>
    </div>
</div>
