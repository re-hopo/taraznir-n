@props([
    'comments' => ''
])

@if( is_array($comments) || is_object($comments))
    @foreach($comments as $comment)
        <x-theme::comment-item :comments="$comment" />
        @if($comment->children->count() > 0)
            <x-theme::comment-index :comments="$comment->children" />
        @endif
    @endforeach
@endif

