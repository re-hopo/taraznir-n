<?php

namespace Modules\Theme\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Helpers\ThemeHelpers;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class Header extends Component
{


    public function render(): View
    {
        $headers = ThemeHelpers::redisHandler( 'headers' ,function (){
            return FilamentNavigation::get('main-menu');
        });

        return view('theme::layout/header');
    }
}
