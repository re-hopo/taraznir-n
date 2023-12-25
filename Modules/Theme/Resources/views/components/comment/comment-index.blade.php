@props([
    'comments' => '',
    'depth'    => 0
])

@if( is_array($comments) || is_object($comments))
    @foreach($comments as $comment)
        <x-theme::comment.comment-item :comment="$comment" :depth="$depth"/>
        @if($comment->children->count() > 0)
            <x-theme::comment.comment-index :comments="$comment->children" :depth="$depth+1" />
        @endif
    @endforeach
@endif

