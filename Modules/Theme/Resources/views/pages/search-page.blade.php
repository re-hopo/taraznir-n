@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'search' ,' تارازنیر | صفحه جستجو') !!}
@endsection


<div>
    <x-theme::breadcrumbs :main="'صفحه جستجو'"  />

    <div class="contact-page-section">
        <div class="auto-container">



        </div>
    </div>

</div>

