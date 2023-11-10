<?php

namespace Modules\Theme\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;
use Modules\Tutorial\Models\Tutorial;
use RyanChandler\FilamentNavigation\Models\Navigation;

class Footer extends Component
{


    public function render(): View
    {
        $menus =(object) Helpers::redisHandler( 'footers_menu' ,function (){
            return [
                'bottom_menu'        => Navigation::fromHandle('bottom-menu'),
                'footer_first_menu'  => Navigation::fromHandle('footer-first-menu'),
                'footer_second_menu' => Navigation::fromHandle('footer-second-menu'),
            ];
        });

        $options = Helpers::redisHandler( 'theme_options' ,function (){
            return
                Option::where('key' ,'theme_options')
                    ->with(['meta' ,'media'])
                    ->first();
        });

        $tutorials = Helpers::redisHandler( 'footers_tutorials' ,function (){
            return
                Tutorial::with(['meta' ,'media' ,'category'])
                    ->activeScope()
                    ->orderBy('chosen' ,'DESC')
                    ->limit(3)
                    ->get();
        });

        return view('theme::layout/footer',[
            'menus'     => $menus,
            'options'   => $options,
            'tutorials' => $tutorials,
        ]);
    }
}
