<div>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="name">Nama channel</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
