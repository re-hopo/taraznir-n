@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'blog' ,' تارازنیر | پروژه') !!}
@endsection

<div class="page-wrapper" style="margin-bottom: 100px;">


    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 right-sidebar">
                    <div class="filter-box">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">

                            <x-theme::page-filter />

                            @if( $this->items && $this->items->isNotEmpty())
                                @php( $to = $this->items->perPage() * $this->items->currentPage() + $this->items->perPage())
                                @php( $from = $to - $this->items->perPage())

                                <div class="left-box d-flex align-items-center">
                                    <div class="results">
                                        نمایش
                                        {{$from}}-{{$this->items->lastPage() === $this->items->currentPage() ? $this->items->total() : $to}}
                                        از
                                        {{$this->items->total()}}
                                        نتیجه
                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                    <div class="row clearfix">
                        @if( $this->items && $this->items->isNotEmpty())
                            @foreach($this->items as $item)
                                <div class="service-block col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="/project/{{$item->slug}}">
                                                <img src="{{$item->images['cover']??''}}" alt="{{$item->title}}" />
                                            </a>
                                        </div>
                                        <div class="lower-content">
                                            <h5>
                                                <a href="/project/{{$item->slug}}">
                                                    {{$item->title}}
                                                </a>
                                            </h5>
                                            <div class="text">
                                                {{$item->summary}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{$this->items->links(data: ['scrollTo' => false])}}
                    @else
                        <livewire:theme::layout.not-found :type="'post'" />
                    @endif
                </div>
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12 left-sidebar">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">
                            <livewire:theme::widgets.search-widget :model="'Project'" />
                            <livewire:theme::widgets.category-widget :model="'Project'" :items="$this->categories" />
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


</div>
