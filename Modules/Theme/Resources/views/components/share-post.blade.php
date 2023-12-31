@props([
    'title'     => __('theme::theme.share'),
    'links'     => null,
    'container' => true
])


<div class="post-share-options">
    <div class="post-share-inner clearfix">
        <ul class="social-box">
            @if($title)
                <span class="share"> {{$title}} :</span>
            @endif

            @foreach($links as $key => $link)
                <li>
                    <a
                        class="fa fa-{{$key == 'telegram' ? 'send' : $key}}"
                        href="{{$link}}"
                    ></a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

