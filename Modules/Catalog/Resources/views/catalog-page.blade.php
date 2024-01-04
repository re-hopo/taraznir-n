@php use Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'catalog' ,' تارازنیر | کاتالوگ') !!}
@endsection

<div class="page-wrapper" style="margin-bottom: 100px;">

    <div class="sidebar-page-container">
        <div class="auto-container">

            <section class="browse-section">
                <div class="auto-container">
                    <div class="mixitup-gallery">
                        <div class="filters">
                            <ul class="filter-tabs" dir="rtl">
                                <li class="filter active" data-role="button" data-filter="all">همه</li>
                                @foreach($this->categories as $category )
                                    <li class="filter" data-role="button" data-filter=".{{$category->slug}}">
                                        {{$category->title}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="row clearfix filter-list" >
                            @foreach($this->items as $item )
                                @php
                                    $categories = $item->category->pluck('slug')->toArray()
                                @endphp

                                <div class="drop-block mix all {{ $categories ? implode(' ' ,$categories) : ''}} product-block-four col-lg-3 col-md-6 col-sm-6" dir="rtl">
                                    <div class="inner-box d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="image">
                                            <span class="number">
                                                {{$loop->iteration}}
                                            </span>
                                            <img src="{{$item->images['thumbnail'] ?? ''}}" alt="{{$item->title}}" width="105" height="80" />
                                        </div>
                                        <div class="content">
                                            <h6>
                                                <a href="catalog/{{$item->slug}}">
                                                    {{$item->title}}
                                                </a>
                                            </h6>
                                            <div class="total-products"> {{$item->tag}} </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
