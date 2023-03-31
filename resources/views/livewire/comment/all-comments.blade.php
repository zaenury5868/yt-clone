<div>
    <h4>{{ $video->AllCommentsCount() }} Komentar</h4>
    @include('includes.recursive', ['comments' => $video->comments])
</div>