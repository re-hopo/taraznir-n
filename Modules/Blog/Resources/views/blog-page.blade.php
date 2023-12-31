@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'blog' ,' تارازنیر | مقاله') !!}
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
                                @php( $to = $this->items->perPage() * $this->items->currentPage() +  $this->items->perPage())
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

                    @if( $this->items && $this->items->isNotEmpty())
                        @foreach($this->items as $item)
                            <div class="news-block-three">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="/blog/{{$item->slug}}">
                                            <img src="{{$item->images['single']??''}}" alt="{{$item->title}}" />
                                        </a>
                                        <div class="post-date">
                                            {!!str_replace('_' ,'<br/>' ,Helpers::jalaliToGregorianAndConversely($item->created_at ,format:'m _ F' ))!!}
                                        </div>
                                    </div>
                                    <div class="lower-content" dir="rtl">
                                        <div class="tags">
                                            <span># دسته‌بندی‌ها</span>
                                            @if($item->category)
                                                @foreach($item->category as $category)
                                                    <a href="/blog/category/{{$category->slug}}">
                                                        {{$category->title}}
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                        <h3>
                                            <a href="/blog/{{$item->slug}}">
                                                {{$item->title}}
                                            </a>
                                        </h3>

                                        <ul class="post-meta d-flex align-items-center flex-wrap clearfix" dir="ltr">
                                            <li>
                                                <span class="author">
                                                    <img src="images/resource/author-4.jpg" alt="{{$item->user->name}}"/>
                                                </span>
                                                {{$item->user->name}}
                                            </li>
                                            <li>
                                                <span class="icon flaticon-bubble-chat"></span>3
                                            </li>
                                            <li>
                                                <span class="icon flaticon-clock"></span>3 min Read
                                            </li>
                                        </ul>
                                        <div class="text">
                                            {{$item->summary}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$this->items->links(data: ['scrollTo' => false])}}
                    @else
                        <livewire:theme::layout.not-found :type="'post'" />
                    @endif
                </div>
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12 left-sidebar">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">

                            <livewire:theme::widgets.search-widget :model="'Blog'" />
                            <livewire:theme::widgets.category-widget :model="'Blog'" :items="$this->categories" />
                            <livewire:theme::widgets.posts-widget :model="'Blog'" :object="$this->object"/>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


</div>
