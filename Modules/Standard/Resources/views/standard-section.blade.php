
<section class="products-section-two">
    <div class="bottom-white-border"></div>
    <div class="auto-container">
        <div class="sec-title centered">
            <h4>
                <b>استاندارد‌ها</b> <span> لیست به روزترین استانداردهای جهان</span>
            </h4>
        </div>

        <div class="inner-container">
            <div class="slide">
                <div class="row clearfix">
                    @if($items)
                        @foreach($items as $item )
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6" dir="rtl">
                                <div class="inner-box d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="image">
                                        <span class="number">{{$loop->iteration}}</span>
                                        <img src="{{$item->images['thumbnail'] ?? ''}}" alt="{{$item->title}}" width="105" height="80" />
                                    </div>
                                    <div class="content">
                                        <h6>
                                            <a href="standard/{{$item->slug}}">
                                                {{$item->title}}
                                            </a>
                                        </h6>
                                        <div class="total-products"> {{$item->tag}} </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>




