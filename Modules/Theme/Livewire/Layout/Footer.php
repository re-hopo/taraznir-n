<?php

namespace Modules\Theme\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Component;

class Footer extends Component
{


    public function render(): View
    {
        return view('theme::layout/footer');
    }
}
