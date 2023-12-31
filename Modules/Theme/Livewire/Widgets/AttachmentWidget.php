<?php

namespace Modules\Theme\Livewire\Widgets;

use Illuminate\View\View;
use Livewire\Component;

class AttachmentWidget extends Component
{
    public ?string $title = '';
    public ?array $items  = [];

    public function mount($title = '' ,$items= []): void
    {
        $this->title = $title;
        $this->items = $items;
    }


    public function render():View
    {
        return view('theme::widgets.attachment-widget');
    }
}
