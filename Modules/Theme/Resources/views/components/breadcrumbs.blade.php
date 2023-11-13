@props([
    'main'        => '',
    'type'        => 'page',
    'breadcrumbs' => [],
])


<section class="page-title">
    <div class="auto-container">
        <h2>{{$main}}</h2>
        <ul class="bread-crumb clearfix">
            <li>
                <a href="/">خانه</a>
            </li>
            @if($type)
                <li>صفحات</li>
            @endif

            @if($breadcrumbs)
                @foreach( $breadcrumbs as $path => $title )
                    <li>
                        <a href="/{{$path}}">{{$title}}</a>
                    </li>
                @endforeach
            @endif

            <li>{{$main}}</li>
        </ul>
    </div>
</section>
