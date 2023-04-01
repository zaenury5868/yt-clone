<div>
    @include('includes.recursive', ['comments' => $video->comments()->latestfirst()->get()])
</div>