<?php

namespace Modules\Theme\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomePage extends Component
{

    #[Layout('theme::layout.app')]
    public function render(): View
    {
        return view('theme::pages/home-page');
    }
}
