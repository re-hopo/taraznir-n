@section('title', ' تارازنیر | درباره ما')

@php
    $meta = $seo?->meta->pluck('value','key')->toArray();
@endphp

@section('seo')
    @php
        echo socialsTagGenerator( 'page' ,(object)[
            'title'       => 'درباره ما ',
            'url'         => url()->current(),
            'keywords'    => indexChecker( $meta ,'keywords'),
            'description' => indexChecker( $meta ,'description')
        ])
    @endphp
@endsection

@section('breadcrumbs')
    @include('layouts.breadcrumbs' ,['routes' => ['About' => '' ] ,'pageName' => 'About' ])
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/about.js') }}" defer></script>
@endsection


<div id="main-content" class="site-main clearfix">
    <div id="content-wrap" class="container">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <div class="site-content">
                        <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="60" data-smobile="60"></div>
                        <div class="themesflat-headings style-2 clearfix" dir="rtl">
                            <h2 class="heading">معرفی شرکت تاراز نیر آداک</h2>
                            <div class="sep has-width w80 accent-bg clearfix"></div>
                            <p class="sub-heading line-height-24 text-777 margin-top-28 margin-right-12" style="line-height: 2!important;font-size: 17px;text-align: justify;">
                                شرکت تاراز نیر آداک در سال 97 با هدف فعالیت در صنعت برق به عنوان طراح، تولید کننده و مجری تاسیس گردید. به این منظور همکارن خود را از بین متخصصان این حوزه انتخاب و شروع به فعالیت نمودیم. حوزه اصلی این شرکت حفاظت در برابر صاعقه، ارتینگ و حفاظت در برابر اضافه ولتاژهای ناگهانی بوده اما با توجه به ظرفیت موجود در شرکت در حوزه های دیگر نیز مانند سیستم های انتقال و توزیع نیرو، پروژه های نیروگاهی و تولید پراکنده، تاسیسات الکتریکی نیز فعالیت کرده ایم. خط مشی شرکت ترجمه و بهره گیری از استانداردهای روز دنیا در پروژه های مرتبط و انتشار این مدارک در جامعه مهندسی میباشد.

                                در سال 99 با بهره گیری از استانداردهای روز دنیا اقدام در به روز رسانی شیوه تولید نموده و موفق به اخذ تاییدیه و گواهی تست در آزمایشگاههای معتبر داخلی شده ایم. رنج تولیدات این شرکت معطوف به سیستمهای حفاظت در برابر صاعقه و ارتینگ و تجهیزات کابل کشی (سینی، نردبان کابل، کاندوئیت و ...) میباشد.

                                همچنین این شرکت با اخذ مجوزهای لازم از مرکز تحقیقات حفاظت فنی و خدمات ایمنی اداره کار به عنوان مشاور حفاظت فنی و خدمات ایمنی در رشته ایمنی برق به صورت حقیقی فعالیت داشته و امکان صدور تاییدیه اتصال زمین اداره کار را نیز دارد.

                                همکاری با شرکتهای بازرگانی و همچنین مهندسی مشاور در زمینه خدمات و تجهیزات صنعت برق این امکان را فراهم ساخته تا در برخی پروژه ها به صورت پیمانکار EPC (طراحی و مهندسی، تامین تجهیزات، نصب و راه اندازی) فعالیت نماییم.
                            </p>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="28" data-mobile="35" data-smobile="35"></div>
                    </div>
                    <div class="themesflat-row gutter-15 clearfix themesflat-headings style-2 mt-5" dir="rtl">
                        <p class="sub-heading line-height-24 text-777 margin-top-33 margin-right-12">
                        <div class="col span_1_of_4">
                            <div class="themesflat-content-box clearfix" data-margin="0 0px 0 0px" data-mobilemargin="0 0 0 0">
                                <div class="themesflat-icon-box icon-top align-center has-width w95 circle light-bg accent-color border-light padding-inner pd33 style-1 clearfix">
                                    <div class="icon-wrap">
                                        <i class="autora-icon-quality"></i>
                                    </div>
                                    <div class="text-wrap">
                                        <h5 class="heading">تضمین کیفیت</h5>
                                        <div class="sep clearfix"></div>
                                        <p class="sub-heading">تیم کنترل پروژه با پایش و کنترل مراحل کار مطابق مبانی علمی روز کیفیت هر پروژه را رصد و تضمین میکند</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col span_1_of_4">
                            <div class="themesflat-content-box clearfix" data-margin="0 0px 0 0px" data-mobilemargin="0 0 0 0">
                                <div class="themesflat-icon-box icon-top align-center has-width w95 circle light-bg accent-color border-light padding-inner pd33 style-1 clearfix">
                                    <div class="icon-wrap">
                                        <i class="autora-icon-quality"></i>
                                    </div>
                                    <div class="text-wrap">
                                        <h5 class="heading">ابزار مدرن</h5>
                                        <div class="sep clearfix"></div>
                                        <p class="sub-heading">استفاده از ابزار استاندارد و مدرن سرعت و کیفیت پروژه های ما را افزایش داده است</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col span_1_of_4">
                            <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                            <div class="themesflat-content-box clearfix" data-margin="0 0px 0 0px" data-mobilemargin="0 0 0 0">
                                <div class="themesflat-icon-box icon-top align-center has-width w95 circle light-bg accent-color border-light padding-inner pd33 style-1 clearfix">
                                    <div class="icon-wrap">
                                        <i class="autora-icon-author"></i>
                                    </div>
                                    <div class="text-wrap">
                                        <h5 class="heading">منابع علمی روز</h5>
                                        <div class="sep clearfix"></div>
                                        <p class="sub-heading">بهره گیری از استانداردهای روز دنیا در ساخت،طراحی و اجرا</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-counter parallax parallax-4 parallax-overlay">
                        <div class="container">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="92" data-mobile="60" data-smobile="60"></div>
                                </div>
                            </div>
                            <div class="themesflat-row gutter-30 separator light clearfix">
                                <div class="col span_1_of_3">
                                    <div class="themesflat-content-box clearfix" data-margin="0 0 0 0" data-mobilemargin="0 0 0 0">
                                        <div class="themesflat-counter style-1 align-center clearfix">
                                            <div class="counter-item">
                                                <div class="inner">
                                                    <div class="text-wrap">
                                                        <div class="number-wrap">
                                                            <span class="number" data-speed="2000" data-to="9240" data-inviewport="yes">9240</span><span class="suffix">+</span>
                                                        </div>
                                                        <h3 class="heading margin-right-18">پروژه تکمیل شد</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>
                                </div>
                                <div class="col span_1_of_3">
                                    <div class="themesflat-content-box clearfix" data-margin="0 0 0 0" data-mobilemargin="0 0 0 0">
                                        <div class="themesflat-counter style-1 align-center clearfix">
                                            <div class="counter-item">
                                                <div class="inner">
                                                    <div class="text-wrap">
                                                        <div class="number-wrap">
                                                            <span class="number" data-speed="2000" data-to="336" data-inviewport="yes">336</span><span class="suffix">+</span>
                                                        </div>
                                                        <h3 class="heading margin-right-6">جوایز برنده شد</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>
                                </div>
                                <div class="col span_1_of_3">
                                    <div class="themesflat-content-box clearfix" data-margin="0 0 0 0" data-mobilemargin="0 0 0 0">
                                        <div class="themesflat-counter style-1 align-center clearfix">
                                            <div class="counter-item">
                                                <div class="inner">
                                                    <div class="text-wrap">
                                                        <div class="number-wrap">
                                                            <span class="number" data-speed="2000" data-to="725" data-inviewport="yes">725</span><span class="suffix">+</span>
                                                        </div>
                                                        <h3 class="heading margin-right-8">مشتریان راضی</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                </div>
                                <div class="col span_1_of_3">
                                    <div class="themesflat-content-box clearfix" data-margin="0 0 0 0" data-mobilemargin="0 0 0 0">
                                        <div class="themesflat-counter style-1 align-center clearfix">
                                            <div class="counter-item">
                                                <div class="inner">
                                                    <div class="text-wrap">
                                                        <div class="number-wrap">
                                                            <span class="number" data-speed="2000" data-to="2984" data-inviewport="yes">2984</span><span class="suffix">+</span>
                                                        </div>
                                                        <h3 class="heading margin-right-10">کارگران شاغل</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="72" data-mobile="60" data-smobile="60"></div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-parallax-overlay overlay-black style2"></div>
                    </div>
                    <div class="themesflat-headings style-2 my-5" dir="rtl">
                        <h2 class="heading">انچه ما انجام میدهیم</h2>
                        <div class="sep has-width w80 accent-bg clearfix"></div>
                        <p class="sub-heading line-height-24 text-777 margin-top-28 margin-right-12">

                        <div class="themesflat-headings style-2 clearfix" dir="rtl">
                            <h2 class="heading">شرح فعالیت های مهندسی شرکت تارازنیر</h2>
                            <ul class="items-list">
                                <li>طراحی ، اجرا و تامین تجهیزات سيستم ارتینگ /حفاظت دربرابر صاعقه/ حفاظت در برابر اضافه ولتاژهای گذرا</li>
                                <li>طراحی ، اجرا و تامین تجهیزات تابلوهاي فشارضعیف اصلی/ فرعي/ توزيع / روشنایی</li>
                                <li>طراحی ، اجرا و تامین تجهیزات تابلوهاي اصلاح ضريب توان و فیلترهای هارمونیکی</li>
                                <li>طراحی ، اجرا و تامین تجهیزات سيستم‌های برق اضطراري/ باطری/ دیزل ژنراتور</li>
                                <li>طراحی ، اجرا و تامین تجهیزات سيستم روشنایی‌</li>
                                <li>طراحی ، اجرا و تامین تجهیزات سیستم های حفاظت کاتدیک</li>
                                <li>طراحی ، اجرا و تامین تجهیزات شبکه های کابل گذاری‌</li>
                                <li>طراحی ، اجرا و تامین تجهیزات سیستم های اتوماسیون صنعتی</li>
                            </ul>
                        </div>
                        <p class="sub-heading line-height-24 text-777 margin-top-28 margin-right-12" style="line-height: 2!important;font-size: 17px;text-align: justify;">
                        <div class="themesflat-headings style-2 clearfix" dir="rtl">
                            <h2 class="heading">پروانه های فعالیت اعضای کمیته فنی شرکت تارازنیر آداک</h2>
                             <ul class="items-list">
                                <li>  مشاور دارای صلاحیت حفاظت فنی و خدمات ایمنی برق اداره کار</li>
                                <li>کارشناس تدوین استاندارد سازمان ملی استاندراد ایران</li>
                                <li>  عضو کارگروه تدوین دستورالعمل کمیته ارتینگ سندیکای صنعت برق ایران</li>
                                <li>  عضو هیئت مدیره و دبیر کمیته فنی TC77 اداره استاندارد (سازگاری الکترومغناطیسی)</li>
                                <li>عضو کمیته فنی TC81 اداره استاندارد (سیستم های حفاظت در برابر صاعقه)</li>
                                <li>       عضو کمیسیون تدوین استاندارد- سازمان ملی استاندارد (استاندارد INSO-IEC 62793)</li>
                            </ul>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="72" data-mobile="60" data-smobile="60"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
