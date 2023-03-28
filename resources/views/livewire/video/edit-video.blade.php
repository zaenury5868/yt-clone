<div @if ($video->processing_percentage < 100) wire:poll @endif>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($this->video->thumbnail) }}" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-md-8">
                        @if ($this->video->processing_percentage != 100)
                            <p>Processing ({{ $this->video->processing_percentage }}%)</p>
                        @endif
                    </div>
                </div>
                <form wire:submit.prevent="update">
                    <div class="form-group mb-2">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" wire:model="video.title">
                    </div>
                    @error('video.title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
            
                    <div class="form-group mb-2">
                        <label for="description">Deskripsi</label>
                        <textarea cols="30" rows="4" class="form-control" wire:model="video.description"></textarea>
                    </div>
                    @error('video.description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
            
                    <div class="form-group mb-2">
                        <label for="visibility">Visibility</label>
                        <select wire:model="video.visibility" class="form-control">
                            <option value="private">Private</option>
                            <option value="public">Public</option>
                            <option value="unlisted">Unlisted</option>
                        </select>
                    </div>
                    @error('video.visibility')
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
        </div>
    </div>
</div>

