@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'about' ,' تارازنیر | خانه') !!}
@endsection


<div>
    <livewire:theme::components.main-slider />
    <livewire:theme::components.introduce-section />
    <livewire:service::service-section />
    <livewire:blog::blog-section />
    <livewire:project::project-section />
    <livewire:standard::standard-section />
    <livewire:news::news-section />
    <livewire:theme::components.clients-section />
</div>
