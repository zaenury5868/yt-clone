<div>
    <div class="d-flex align-items-center mb-4">
        <img src="{{ asset('/images/' . auth()->user()->channel->image) }}" class="rounded-circle" height="80px" width="80px">
        <input type="text" wire:model="body" class="my-2 ml-2 comment-form-control" placeholder="Tuliskan komentar">
        <div class="d-flex justify-content-end align-items-center">
            @if ($body)
                <a href="" wire:click.prevent="resetForm" class="text-decoration-none">Kembali</a>
                <a href="" wire:click.prevent="addForm" class="mx-2 btn btn-secondary">Komentar</a>
            @endif
        </div>
    </div>
</div>