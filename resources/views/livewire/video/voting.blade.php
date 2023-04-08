<div class="d-flex align-items-center" style="gap: 1rem;">
    <div class="d-flex gray-text" style="background-color: #f1f1f1; padding: .5rem; border-radius: .75rem;">
        <div class="d-flex align-items-center">
            <a href="javascript:void(0)" class="text-decoration-none material-icons @if($likeActive) text-primary @else gray-text @endif" wire:click.prevent="like" style="font-size: 1.5rem; cursor: pointer;">thumb_up</a>
            <span class="mx-2">{{ $likes }}</span>
        </div>
        <div class="px-3">|</div>
        <div class="d-flex align-items-center">
            <a href="javascript:void(0)" class="text-decoration-none material-icons @if($dislikeActive) text-primary @else gray-text @endif" wire:click.prevent="dislike" style="font-size: 1.5rem; cursor: pointer;">thumb_down</a>
            <span class="mx-2">{{ $dislikes }}</span>
        </div>
    </div>
    <div style="background-color: #f1f1f1; padding: .5rem; border-radius: .75rem;">
        <a href="javascript:void(0)" class="d-flex align-items-center text-capitalize text-decoration-none">
            <span class="material-icons gray-text pr-1" style="font-size: 1.5rem; cursor: pointer; gap: 20px;">share</span>
            <span class="mx-2 fw-semibold">bagikan</span>
        </a>
    </div>
</div>