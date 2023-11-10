@php use \Modules\Theme\Helpers\Helpers; @endphp
<section class="main-slider-two">
    <div class="main-slider-carousel owl-carousel owl-theme">
        @if($items)
            @foreach($items as $item)
                <div class="slide">
                    <div class="image-layer" style="background-image: url({{$item->images['single'] ?? ''}})"></div>
                    <div class="auto-container" style="margin:initial">
                        <div class="content-box">
                            <div class="box-inner">
                                <div class="title">{{Helpers::getMetaValueByKey($item ,'top_title')}}</div>
                                <h3>{{Helpers::getMetaValueByKey($item ,'title')}}</h3>
                                <div class="text">{{Helpers::getMetaValueByKey($item ,'under_title')}}</div>
                                <div class="price"><span>{{Helpers::getMetaValueByKey($item ,'top_button')}}</span></div>

                                <div class="button-box">
                                    <a href="{{Helpers::getMetaValueByKey($item ,'link')}} " class="theme-btn btn-style-one">
                                        <span class="icon flaticon-left-arrow"></span>
                                        {{Helpers::getMetaValueByKey($item ,'button_title')}}
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        @endif
    </div>


    <div class="social-box">
        <a href="#">Tw.</a>
        <a href="#">Fa.</a>
        <a href="#">In.</a>
    </div>

</section>
