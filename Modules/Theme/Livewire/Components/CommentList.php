<?php

namespace Modules\Theme\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class CommentList extends Component
{
    public function render(): View
    {
        return view('theme::components.comment-list');
    }
}
