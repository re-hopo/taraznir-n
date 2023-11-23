@props([
    'links' => null
])

<div class="post-share-options">
    <div class="post-share-inner clearfix">
        <ul class="social-box">
            <span class="share">@lang('blog::blog.share') :</span>
            @if($links)
                @foreach($links as $key => $link)
                    <li>
                        <a
                            class="fa fa-{{$key == 'telegram' ? 'send' : $key}}"
                            href="{{$link}}"
                        ></a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
