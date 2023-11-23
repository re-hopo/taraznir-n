@php use \Modules\Theme\Helpers\Helpers; @endphp
@props([
    'next'     => null,
    'previous' => null
])

<div class="more-posts">
    <div class="more-posts-inner d-flex justify-content-between align-items-center flex-wrap">
        @if($previous)
            <div class="new-post">
                <div class="post-inner">
                    <span class="image">
                        <a href="/blog/{{$previous->slug}}">
                            <img src="{{$previous->images['thumbnail']??''}}" alt="{{$previous->title}}" />
                        </a>
                    </span>
                    <a href="/blog/{{$previous->slug}}">{{$previous->title}}</a>
                    <div class="post-info">
                        <div class="author">
                            <img src="/images/resource/author-5.jpg" alt="{{$previous->user->name}}" />
                            <span>{{$previous->user->name}}</span>
                        </div>

                        <div class="date">
                            {{Helpers::jalaliToGregorianAndConversely($previous->created_at ,format:'d F, Y' )}}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($next)
            <div class="new-post">

                <div class="post-inner">
                    <span class="image">
                        <a href="/blog/{{$next->slug}}">
                            <img src="{{$next->images['thumbnail']??''}}" alt="{{$next->title}}" />
                        </a>
                    </span>
                    <a href="/blog/{{$next->slug}}">{{$next->title}}</a>
                    <div class="post-info">
                        <span class="author">
                            <img src="/images/resource/author-5.jpg" alt="{{$next->user->name}}" />
                        </span>
                        {{$next->user->name}}
                        <span class="date">
                            {{Helpers::jalaliToGregorianAndConversely($next->created_at ,format:'d F, Y' )}}
                        </span>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
