<div>
    <button wire:click.prevent="toggle" style="background-color: #f1f1f1; padding: .5rem; border-radius: .75rem;" class="btn btn-md gray-text fw-semibold text-uppercase {{ $userSubscribed ? 'sub-btn-active' : 'sub-btn' }}" style="border-radius: .75rem;">
        {{ $userSubscribed ? 'Subscribed' : 'Subscribe' }}
    </button>
</div>
