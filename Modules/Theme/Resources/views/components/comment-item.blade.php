@php use \Modules\Theme\Helpers\Helpers; @endphp
@props([
    'comment' => '',
    'depth'   => 0
])


<div class="comment-box depth-{{$depth}}">
    <div class="comment">
        <div class="author-thumb">
            <img src="{{$comment->user->getAvatarAttribute()}}" alt="{{$comment->user->name}}">
        </div>
        <div class="comment-info clearfix">
            <strong>{{$comment->user->name}}</strong>
            <div class="comment-time">{{Helpers::jalaliToGregorianAndConversely($comment->created_at ,format:'d F Y' )}}</div>
        </div>
        <div class="text">
            {{$comment->body}}
        </div>
        <a
            wire:click="$dispatch('set-parent-id' ,{parentID:{{$comment->id}}})"
            class="reply-btn flaticon-reply-all"
            href="javascript:void(0)"
        ></a>
    </div>
</div>
