<div class="sidebar-widget-two post-widget">
    <div class="sidebar-title-two">
        <h5>{{$title}} اخیر </h5>
    </div>
    <div class="widget-content">

        @if($this->items)
            @foreach($this->items as $item)
                <div class="post">
                    <div class="thumb">
                        <div class="post-number">0{{$loop->iteration}}</div>
                        <a href="{{strtolower($this->model)}}/{{$item->slug}}">
                            <img src="{{$item->images['thumbnail'] ?? ''}}" alt="{{$item->title}}" />
                        </a>
                    </div>
                    <div class="category">
                        {{$item->category->random()->title}}
                    </div>
                    <h6>
                        <a href="{{strtolower($this->model)}}/{{$item->slug}}">
                            {{$item->title}}
                        </a>
                    </h6>
                </div>
            @endforeach
        @endif

    </div>
</div>
