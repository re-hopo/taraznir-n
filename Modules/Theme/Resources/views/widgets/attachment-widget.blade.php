<div class="sidebar-widget-two download-widget">
    <div class="sidebar-title-two" dir="rtl">
        <h5>
            {{$this->title}}
        </h5>
    </div>

    <ul class="download-file">
        @foreach($this->model->getMedia('attachment') as $attachment )
            <li>
                <a href="{{$attachment->getUrl()}}" target="_blank">
                    {{$attachment->name}}
                    {!! \Modules\Theme\Helpers\Helpers::fileExtensionIcon($attachment->getPath())  !!}
                </a>
            </li>
        @endforeach
    </ul>
</div>
