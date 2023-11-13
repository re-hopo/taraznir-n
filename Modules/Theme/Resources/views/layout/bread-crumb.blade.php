<section class="page-title">
    <div class="auto-container">
        <h2>{{$title}}</h2>
        <ul class="bread-crumb clearfix">
            @if($paths)
                @foreach($paths as $path)
                    @if($loop->iteration == 1)
                        <li>
                            <a href="/{{$path['route']}}">
                                {{$path['title']}}
                            </a>
                        </li>
                    @else
                        <li>Pages</li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</section>
