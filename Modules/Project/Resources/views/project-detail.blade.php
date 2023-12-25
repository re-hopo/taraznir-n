@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $item ,null ,"$item->slug تارازنیر |  پروژه | " ,true) !!}
@endsection


<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <section class="portfolio-detail-section project-detail">
                <div class="auto-container">
                    <div class="image d-flex align-items-center">
                        <img src="{{$item->images['single']??''}}" alt="{{$item->title}}" />
                        <div class="overlay-box">
                            <div class="content">
                                <ul>
                                    <li><span>مشتری: </span>{{Helpers::getMetaValueByKey($item->meta ,'client')}}</li>
                                    <li><span>تاریخ: </span>{{Helpers::getMetaValueByKey($item->meta ,'date')}}</li>
                                    <li><span>دسته بندی: </span>{{Helpers::getMetaValueByKey($item->meta ,'category')}}</li>
                                    <li>
                                        <x-blog::share-blog :links="$this->share"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h3>{{$item->title}}</h3>
                    <div class="detail-content">
                        {!! $item->content !!}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

