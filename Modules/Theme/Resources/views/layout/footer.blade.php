@php use \Modules\Theme\Helpers\Helpers; @endphp
<footer class="main-footer style-two" dir="rtl">
    <div class="auto-container">
        <div class="widgets-section">
            <div class="row clearfix">
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <div class="logo">
                                    <a href="/">
                                        <img src="/images/logos/taraznir-logo-0.25x.png" alt="taraznir logo" width={158} height={41}/>
                                    </a>
                                </div>
                                <div class="text">
                                    {!! $options?->value !!}
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="subscribe-box">
                                <form method="post" action="/form/subscribe">
                                    <div class="form-group">
                                        <input
                                            type="email"
                                            name="search-field"
                                            placeholder="ایمیل خود را وارد کنید"
                                        />
                                        <button type="submit" class="theme-btn submit-btn flaticon-send"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h6>خدمات اصلی</h6>
                                <ul class="page-list-two">
                                    @if( !empty( $menus->footer_first_menu->items ) )
                                        @foreach($menus->footer_first_menu->items as $item)
                                            <li>
                                                @if( !empty( Modules\Theme\Helpers\Helpers::indexChecker( $item ,'data' )) )
                                                    <a
                                                        href="{{$item['data']['url'] }}"
                                                        target="{{$item['data']['target'] }}"
                                                    >
                                                        {{ $item['label']}}
                                                    </a>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget sidebar-widget-two post-widget">
                                <h6>آموزش تصویری</h6>
                                <div class="widget-content">
                                    @if($tutorials)
                                        @foreach($tutorials as $tutorial)
                                            <div class="post">
                                                <div class="thumb">
                                                    <div class="post-number">0{{$loop->iteration}}</div>
                                                    <a href="service/{{$tutorial->slug}}">
                                                        <img src="{{$tutorial->images['thumbnail'] ?? ''}}" alt="{{$tutorial->title}}">
                                                    </a>
                                                </div>
                                                <h6>
                                                    <a href="service/{{$tutorial->slug}}">{{$tutorial->title}}</a>
                                                </h6>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget call-us-information">
                                <h6>اطلاعات تماس</h6>
                                <ul>
                                    <li>
                                        <div class="inner">
                                            <span class="fa fa-map-marker"></span>
                                            <span class="call-text">
                                                {{Helpers::getMetaValueByKey( $options ,'footer_address')}}
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner">
                                            <span class="fa fa-phone"></span>
                                            <div>
                                                @foreach(Helpers::getMetaValuesByKey( $options ,'footer_phone') as $phone)
                                                    <p> {{$phone}} </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner">
                                            <span style="font-size: 15px" class="fa fa-envelope"></span>
                                            <span class="call-text">
                                                 {{Helpers::getMetaValueByKey( $options ,'info_email')}}
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="d-flex justify-content-between align-items-center flex-wrap">



                <ul class="footer-bottom-nav">
                    @if( !empty( $menus->bottom_menu->items ) )
                        @foreach($menus->bottom_menu->items as $item)
                            <li>
                                @if( !empty( Modules\Theme\Helpers\Helpers::indexChecker( $item ,'data' )) )
                                    <a
                                        href="{{$item['data']['url'] }}"
                                        target="{{$item['data']['target'] }}"
                                    >
                                        {{ $item['label']}}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>

                <ul class="social-box">
                    @foreach(Helpers::getMetaValuesByLikeKeys( $options ,'social_') as $key => $link)
                        <a
                            style="font-size: 18px; margin: 0 5px;color: #000;"
                            href="{{$link}}"
                            class="fa {{last(explode('_' ,$key))}}"
                        >
                        </a>
                    @endforeach
                </ul>

                <div class="copyright">©
                    تمام حقوق برای <span> Taraznir</span> محفوظ است
                </div>
            </div>
        </div>
    </div>
</footer>
