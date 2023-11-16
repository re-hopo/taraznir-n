<?php

namespace Modules\Theme\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;

class HomePage extends Component
{

    #[Layout('theme::layout.app')]
    public function render(): View
    {
        $seo = Helpers::redisHandler( 'main_pages_seo' ,function (){
            return Option::where('key' ,'main_pages_seo')->get();
        });

        return view('theme::pages/home-page',[
            'seo' => $seo
        ]);
    }
}
