<div class="portfolio-single__inner">
    <h3 class="title">
        {{$this->title}}
    </h3>
    <ul class="portfolio-single__widget">
        @foreach($this->items as $key => $val )
            <li>
                <strong>{{$key}}:</strong><br>
                {{$val}}
            </li>
        @endforeach
    </ul>
</div>
