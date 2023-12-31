@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $item ,null ,"$item->slug تارازنیر |  مقاله | " ,true) !!}
@endsection


<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 right-sidebar">
                <div class="blog-detail">
                    <div class="inner-box">

                        <div class="image">
                            <img src="{{$item->images['single']??''}}" alt="{{$item->title}}" />
                            <div class="post-date">
                                {!!str_replace('_' ,'<br/>' ,Helpers::jalaliToGregorianAndConversely($item->created_at ,format:'m _ F' ))!!}
                            </div>
                        </div>

                        <div class="lower-content" dir="rtl">
                            <div class="blog-extra-details">
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
                                <ul class="post-meta d-flex align-items-center flex-wrap clearfix" dir="rtl">
                                    <li>
                                    <span class="author">
                                        <img src="/images/resource/author-4.jpg" alt="{{$item->user->name}}"/>
                                    </span>
                                        {{$item->user->name}}
                                    </li>
                                    @if($item->comment->count())
                                        <li>
                                            <span class="icon flaticon-bubble-chat"></span>
                                            {{$item->comment->count()}}
                                        </li>
                                    @endif
                                    <li>
                                        <span class="icon flaticon-clock"></span>
                                        {{Helpers::getMetaValueByKey($item->meta ,'read_time' ,5)}}
                                        دقیقه
                                    </li>
                                </ul>
                            </div>
                            <div class="text" style="margin-bottom: 160px">
                                {!!$item->content!!}
                            </div>

                            <x-theme::share-post :links="$this->share"/>
                            <x-theme::more-posts :next="$this->next" :previous="$this->previous" />
                        </div>

                        <livewire:theme::components.comment-list />
                        <livewire:theme::forms.comment-form :model="Blog::class" :id="$item->id" />

                    </div>
                </div>

            </div>

            <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12 left-sidebar">
                <aside class="sidebar sticky-top">
                    <div class="sidebar-inner">
                        <livewire:theme::widgets.search-widget :model="'Blog'" :isDetailPage="true"/>
                        <livewire:theme::widgets.category-widget :model="'Blog'" :items="$this->categories" :isDetailPage="true"/>
                        <livewire:theme::widgets.posts-widget :model="'Blog'" :object="$this->object"/>
                    </div>
                </aside>
            </div>

        </div>
    </div>
</div>

