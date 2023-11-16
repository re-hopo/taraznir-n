@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,null ," تارازنیر | " .$item->title ,$item) !!}
@endsection

<div>

    <section class="page-title-two">
        <div class="auto-container">
            <div class="content">
                <h2>{{$item->title}}</h2>
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

    <section class="service-detail-section">
        <div class="auto-container">
            <div class="image">
                <img src="{{$item->images['single']??''}}" alt="{{$item->title}}">
            </div>
            <div class="content" style="padding:30px 10px">
                {!! $item->content !!}
            </div>
        </div>
    </section>

</div>
