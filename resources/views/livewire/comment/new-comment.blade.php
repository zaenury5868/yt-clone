<div>
    <div class="d-flex mb-4">
        <div class="me-auto">
            <img src="{{ auth()->user()->channel->picture }}" class="rounded-circle" height="50" width="50">
        </div>
        <div class="d-flex flex-column ms-auto w-100">
            <input type="text" wire:model="body" class="my-2 ml-2 comment-form-control" placeholder="Tuliskan komentar...">
            <div class="d-flex justify-content-end align-items-center">
                @if ($body)
                    <a href="javascript:void(0)" wire:click.prevent="resetForm" class="text-decoration-none text-capitalize">batal</a>
                    <a href="javascript:void(0)" wire:click.prevent="addForm" class="mx-2 btn btn-secondary text-capitalize">komentar</a>
                @endif
            </div>
        </div>
    </div>
</div>