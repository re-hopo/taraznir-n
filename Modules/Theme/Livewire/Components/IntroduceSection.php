<?php

namespace Modules\Theme\Livewire\Components;

use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;

class IntroduceSection extends Component
{
    public function render()
    {
        return view('theme::components.introduce-section');
    }
}
