@php($except_item = [])

<section class="services-section">
    <div class="auto-container">

        <div class="sec-title" style="margin-bottom: 60px" dir="rtl" >
            <h4>
                <b>پروژه‌های</b> <span>منتخب </span>
            </h4>
        </div>

        <div class="services-info-tabs">
            <div class="services-tabs tabs-box">
                <div class="feature-icon">
                    <img src="images/icons/feature-1.png" alt="" />
                </div>
                <ul class="tab-btns tab-buttons clearfix">
                    @if($cats)
                        @foreach($cats as $cat)
                            <li data-tab="#{{$cat->slug}}" class="tab-btn {{$loop->iteration == 1 ? 'active-btn' : ''}}">
                                {{$cat->title}}
                            </li>
                        @endforeach
                    @endif
                </ul>


                <div class="tabs-content">
                    @if($cats)
                        @foreach($cats as $cat)
                            <div
                                class="tab {{$loop->iteration == 1 ? 'active-tab' : ''}}"
                                id="{{$cat->slug}}"
                            >
                                <div class="row clearfix">

                                    @foreach($cat->project as $item)
                                        @if(!in_array( $item->id ,$except_item) )
                                            @php( $except_item[] = $item->id )
                                            <div class="service-block active col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="project/{{$item->slug}}">
                                                            <img src="{{$item->images['cover'] ?? ''}}" width="420" height="315" alt="{{$item->title}}" />
                                                        </a>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h5>
                                                            <a href="project/{{$item->slug}}">
                                                                {{$item->title}}
                                                            </a>
                                                        </h5>
                                                        <div class="text">
                                                            {{Str::of($item->summary)->limit(150)}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if( $loop->iteration >= 2 )
                                                @break
                                            @endif
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

        <div class="sponsors-box-con">
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @if($cats && false)
                    @foreach($cats as $cat)
                        @if($cat->project)
                            @foreach($cat->project as $item)
                                @if(!in_array( $item->id ,$except_item) )
                                    <li class="slide-item">
                                        <figure class="image-box">
                                            <a href="project/{{$item->slug}}">
                                                <img src="{{$item->images['cover'] ?? ''}}" alt="{{$item->title}}">
                                            </a>
                                        </figure>
                                    </li>
                                @endif
                                @if( $loop->iteration >= 15 )
                                    @break
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif

            </ul>
        </div>

    </div>
</section>
