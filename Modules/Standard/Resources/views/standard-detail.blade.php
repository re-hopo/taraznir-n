@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $item ,null ,"$item->slug تارازنیر |  استاندارد | " ,true) !!}
@endsection


<div class="sidebar-page-container service-detail-page">
    <div class="container">
        <div class="row mt-none-30">

            <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 right-sidebar">
                <div>
                    <div class="inner-box">

                        <div class="portfolio-single__thumb mb-30">
                            <img src="{{$item->images['single']??''}}" alt="{{$item->title}}" />
                        </div>
                        <h2>{{$item->title}}</h2>

                        <div class="content">
                            {!! $item->summary !!}
                        </div>

                        <div class="row mb-30 mt-none-30">
                            <div class="col-lg-6 col-md-6 com-sm-6 mt-30">
                                <img src="/images/gallery/2.jpg" alt="">
                            </div>
                            <div class="col-lg-6 col-md-6 com-sm-6 mt-30">
                                <img src="/images/gallery/3.jpg" alt="">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12 left-sidebar">
                <aside class="sidebar sticky-top">
                    <div>
                        @php
                            $items =
                                [
                                    __('standard::standard.country')   => Helpers::getMetaValueByKey($item->meta ,'country'   ,'-'),                                    __('standard::standard.year')      => Helpers::getMetaValueByKey($item->meta ,'year'      ,'-'),
                                    __('standard::standard.group')     => Helpers::getMetaValueByKey($item->meta ,'group'     ,'-'),
                                    __('standard::standard.presenter') => Helpers::getMetaValueByKey($item->meta ,'presenter' ,'-'),
                                ];
                        @endphp
                        <livewire:theme::widgets.info-list-widget
                            :title="__('standard::standard.standard_detail')"
                            :items="$items"
                        />

                        <x-theme::share-post :title="''" :container="false" :links="$this->share"/>

                        <livewire:theme::widgets.attachment-widget
                            :title="__('standard::standard.standard_detail')"
                            :items="$items"
                        />
                    </div>

                </aside>
            </div>


        </div>
    </div>
</div>

