<?php

namespace Modules\Theme\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;

class AboutPage extends Component
{

    #[Layout('theme::layout.app')]
    public function render()
    {
        $seo = Helpers::redisHandler( 'main_pages_seo' ,function (){
            return Option::where('key' ,'main_pages_seo')->first();
        });

        return view('theme::pages.about-page' ,[
            'seo' => $seo
        ]);
    }
}
