<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('theme::layout.head')

    <body>
        <div class="page-wrapper">
            @livewire('theme::layout.header')
            @livewire('theme::layout.sidebar')

            {{ $slot }}

            @livewire('theme::layout.footer')
        </div>

        @include('theme::layout.scroll-to-top')
        @include('theme::layout.scripts')
    </body>

</html>
