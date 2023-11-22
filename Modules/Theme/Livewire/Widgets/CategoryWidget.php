<?php

namespace Modules\Theme\Livewire\Widgets;

use Illuminate\View\View;
use Livewire\Component;

class CategoryWidget extends Component
{
    public string $model = '';
    public int|null $categoryID = 0;
    public $items;

    public function mount($items ,$model): void
    {
        $this->model = strtolower($model);
        $this->items = $items;
    }

    public function submit($categoryID): void
    {
        $this->categoryID = $categoryID;
        $this->dispatch('setCategory' ,$this->categoryID );
    }

    public function render(): View
    {
        return view('theme::widgets.category-widget');
    }
}
