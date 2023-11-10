<?php

namespace Modules\Theme\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;
use RyanChandler\FilamentNavigation\Models\Navigation;

class Header extends Component
{

    public function render(): View
    {
        $menu = Helpers::redisHandler( 'headers_menu' ,function (){
            return
                Navigation::fromHandle('main-menu');
        });

        $options = Helpers::redisHandler( 'theme_options' ,function (){
            return
                Option::where('key' ,'theme_options')
                ->with(['meta' ,'media'])
                ->first();
        });

        return view('theme::layout/header',[
            'menu'    => $menu,
            'options' => $options,
        ]);
    }
}
