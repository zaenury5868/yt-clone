<div>
    <button wire:click.prevent="toggle" class="btn btn-md text-uppercase {{ $userSubscribed ? 'sub-btn-active' : 'sub-btn' }}" style="border-radius: .75rem;">
        {{ $userSubscribed ? 'Subscribed' : 'Subscribe' }}
    </button>
</div>
