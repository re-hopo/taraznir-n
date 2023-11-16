<div class="page-wrapper">

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 right-sidebar">

                    @if($items)
                        @foreach($items as $item)
                            <div class="news-block-three">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="/blog/{{$item->slug}}">
                                            <img src="{{$item->images['cover']??''}}" alt="{{$item->title}}" />
                                        </a>
                                        <div class="post-date">
                                            24 <br/> Feb
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <div class="tags">
                                            <span># Tags</span>
                                            <a href="#">Links</a>
                                            <a href="#">Brave</a>
                                            <a href="#">Brave</a>
                                        </div>
                                        <h3>
                                            <a href="/blog/{{$item->slug}}">
                                                {{$item->title}}
                                            </a>
                                        </h3>
                                        <ul class="post-meta d-flex align-items-center flex-wrap clearfix">
                                            <li>
                                              <span class="author">
                                                <img src="images/resource/author-4.jpg" alt=""/>
                                              </span>
                                                Alaxandar / <span>4 year</span>
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
                    @endif

                    {{$items->links()}}

                </div>
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12 left-sidebar">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">

                            <livewire:theme::widgets.gallery-widget />
                            <livewire:theme::widgets.search-widget />
                            <livewire:theme::widgets.follow-us-widget />
                            <livewire:theme::widgets.posts-widget />
                            <livewire:theme::widgets.ads-widget />
                            <livewire:theme::widgets.news-widget />
                            <livewire:theme::widgets.category-widget />
                            <livewire:theme::widgets.tags-widget />

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

</div>
