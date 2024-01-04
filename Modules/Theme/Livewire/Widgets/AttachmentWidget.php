<?php

namespace Modules\Theme\Livewire\Widgets;

use Illuminate\View\View;
use Livewire\Component;

class AttachmentWidget extends Component
{
    public ?string $title = '';
    public ?object $model = null;

    public function mount($title = '' ,$model = []): void
    {
        $this->title = $title;
        $this->model = $model;
    }


    public function render():View
    {
        return view('theme::widgets.attachment-widget');
    }
}
