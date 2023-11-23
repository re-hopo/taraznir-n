<div class="sidebar-widget-two services-widget">
    <div class="sidebar-title-two" dir="rtl">
        <h5>دسته‌بندی</h5>
    </div>
    <div class="widget-content">
        <ul class="category-list-two">
            @if($this->items && $this->items->isNotEmpty())
                @if($this->categoryID)
                    <li>
                        <a wire:click="submit(0)" href="javascript:void(0)" dir="rtl">
                            <x-icon name="heroicon-s-x-mark" />
                            حذف فیلتر دسته‌بندی
                        </a>
                    </li>
                @endif

                @foreach($this->items as $item)
                    <li @class(['active' => $this->categoryID === $item->id ]) >
                        <a
                            @if(!$this->isDetailPage)
                                wire:click="submit({{$item->id}})"
                                href="javascript:void(0)"
                            @else
                                href="/{{$this->model}}/category/{{$item->slug}}"
                            @endif
                            dir="rtl"
                        >
                            @if($item->icon)
                                <x-icon name="{{ $item->icon }}" />
                            @endif
                            {{$item->title}}
                            <span class="number">{{count($item->{$this->model})}}</span>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
