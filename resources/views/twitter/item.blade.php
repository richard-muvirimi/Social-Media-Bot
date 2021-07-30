<div class="mx-5">
    @if ($tweet->text)
        <hr>
        <div class="row">
            <div class="col-md-2"><img src='{{ $tweet->user->profile_image_url }}' width='150px' height='150px'></div>
            <div class="col">
                <p>{{ $tweet->text }}</p>
                <p>{{ $tweet->created_at }}</p>
                <p>{{ $tweet->user->name }}</p>
                <p>{{ $tweet->user->screen_name }}</p>
            </div>
        </div>
    @endif
</div>
