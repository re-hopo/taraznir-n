<?php

namespace Modules\Theme\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
class AboutPage extends Component
{

    #[Layout('theme::layout.app')]
    public function render(): View
    {
        return view('theme::pages.about-page' ,[
            'seo' =>Helpers::mainPagesSEO()
        ]);
    }
}
