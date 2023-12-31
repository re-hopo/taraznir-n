<?php

namespace Modules\Theme\Livewire\Widgets;

use Illuminate\View\View;
use Livewire\Component;

class ShareWidget extends Component
{
    public ?string $title = '';
    public ?array $items  = [];

    public function mount($title = '' ,$items= []): void
    {
        $this->title = $title;
        $this->items = $items;
    }


    public function render(): View
    {
        return view('theme::widgets.share-widget');
    }
}
