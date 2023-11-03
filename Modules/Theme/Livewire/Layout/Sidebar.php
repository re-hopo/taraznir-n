<?php

namespace Modules\Theme\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Component;

class Sidebar extends Component
{


    public function render(): View
    {
        return view('theme::layout/sidebar');
    }
}
