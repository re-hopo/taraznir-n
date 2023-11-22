<?php

namespace Modules\Theme\Livewire\Widgets;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Http\Controllers\ThemeController;

class SearchWidget extends Component
{
    public ?string $model   = '';
    public ?string $keyword = '';

    public function mount($model = ''): void
    {
        $this->model = $model;
    }

    public function clearFilter(): void
    {
        $this->keyword = null;
        $this->dispatch('setSearching' ,null );
    }

    public function submit(): void
    {
        $this->keyword = trim($this->keyword);
        $this->dispatch('setSearching' ,$this->keyword );
    }


    public function render(): View
    {
        return view('theme::widgets.search-widget',[
            'placeholder' => ThemeController::$models[$this->model] ?? ''
        ]);
    }
}
