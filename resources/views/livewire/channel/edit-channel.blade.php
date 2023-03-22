<div>
    <form wire:submit.prevent="update">
        <div class="form-group mb-2">
            <label for="name">Nama channel</label>
            <input type="text" class="form-control" wire:model="channel.name">
        </div>
        @error('channel.name')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group mb-2">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" wire:model="channel.slug">
        </div>
        @error('channel.slug')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group mb-2">
            <label for="description">Deskripsi</label>
            <textarea cols="30" rows="4" class="form-control" wire:model="channel.description"></textarea>
        </div>
        @error('channel.description')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group mb-2">
            <input type="file" wire:model="image">
        </div>
        <div class="form-group">
            @if ($image)
                Preview :
                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
            @endif
        </div>
        @error('image')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        @if (session()->has('message'))
            <div class="text-success">
                {{ session('message') }}
            </div>
            
        @endif
    </form>
</div>
