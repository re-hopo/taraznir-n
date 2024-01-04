@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'gallery' ,' تارازنیر | گالری تصاویر') !!}
@endsection

<div class="page-wrapper gallery-page" style="margin-bottom: 100px;">

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 right-sidebar">

                    <div class="container-fluid" dir="rtl">
                        <div class="row margin-lg-40b">

                            @foreach($this->items as $item)
                                <div class="col-sm-12 gallery-item">
                                    <div class="titles left">
                                        <div class="d-flex gap-2 align-items-center">
                                            <h3 class="title">
                                                {{$item->title}}
                                            </h3>
                                            <span>{{$item->date}}</span>
                                        </div>
                                        <div class="summary">
                                            {{$item->summary}}
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-sm-12 ">
                                            <div class="pswp-gallery pswp-gallery--single-column gallery-container" id="gallery-container">
                                                @foreach($item->getMedia('*') as $image)
                                                    <a href="javascript:void(0)"
                                                       data-pswp-src="{{$image->getUrl('single')}}"
                                                       data-pswp-width="2500"
                                                       data-pswp-height="1666"
                                                       target="_blank">
                                                        <img
                                                            src="{{$image->getUrl('cover')}}"
                                                            alt="{{$image->name}}"
                                                        />
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12 left-sidebar">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">

                            <livewire:theme::widgets.search-widget :model="'Blog'" />

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


</div>
