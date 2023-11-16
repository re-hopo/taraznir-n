@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'service' ,' تارازنیر | خدمات') !!}
@endsection

<div>

    <section class="page-title-two">
        <div class="auto-container">
            <div class="content">
                <h2>خدمات</h2>
                <div class="button-box">
                    <a href="/contact-us" class="theme-btn btn-style-eleven clearfix">
                    <span class="btn-wrap">
                        <span class="text-one">تماس با ما</span>
                        <span class="text-two">تماس با ما</span>
                    </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="service-page-section mb-5">
        <div class="auto-container" style="max-width: 1200px">
            <div class="row clearfix">
                @if($items)
                    @foreach( $items as $item )
                        <div class="vision-block style-{{$loop->iteration}} col-lg-6 col-md-12 col-sm-12">
                            <div
                                class="inner-box wow fadeInLeft"
                            >
                                <h3>
                                    <a href="/service/{{$item->slug}}">
                                        خدمات <br />
                                        {{$item->title}}
                                    </a>
                                </h3>
                                <div class="text">
                                    {{$item->summary}}
                                </div>
                                <a href="/service/{{$item->slug}}" class="read-more">
                                    ادامه مطلب
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

</div>

