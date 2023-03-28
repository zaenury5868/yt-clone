<div>
    <div class="d-flex gray-text">
        <div class="d-flex aling-items-center">
            <span class="material-icons @if($likeActive) text-primary @else gray-text @endif" wire:click.prevent="like" style="font-size: 2rem; cursor: pointer;">thumb_up</span>
            <span class="mx-2">{{ $likes }}</span>
        </div>
        <div class="d-flex aling-items-center">
            <span class="material-icons @if($dislikeActive) text-primary @else gray-text @endif" wire:click.prevent="dislike" style="font-size: 2rem; cursor: pointer;">thumb_down</span>
            <span class="mx-2">{{ $dislikes }}</span>
        </div>
    </div>
</div>