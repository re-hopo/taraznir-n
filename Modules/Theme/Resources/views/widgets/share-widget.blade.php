<div class="post-share-options">
    <div class="post-share-inner clearfix">
        <ul class="social-box">
            <span class="share">
                {{$this->title}}
            </span>
            @foreach($this->items as $key => $link)
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
