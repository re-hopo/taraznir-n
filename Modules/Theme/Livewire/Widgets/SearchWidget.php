<?php

namespace Modules\Theme\Livewire\Widgets;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Http\Controllers\ThemeController;

class SearchWidget extends Component
{
    public ?string $model   = '';
    public ?string $keyword = '';
    public bool $isDetailPage = false;

    public function mount($model = '' ,$isDetailPage = false): void
    {
        $this->model        = $model;
        $this->isDetailPage = $isDetailPage;
    }

    public function clearFilter(): void
    {
        $this->keyword = null;
        $this->dispatch('setSearching' ,null );
    }

    public function submit(): void
    {
        $this->keyword = trim($this->keyword);
        if( $this->isDetailPage )
            $this->redirectRoute("search" ,[
                'keyword' => $this->keyword,
                'model'   => $this->model,
            ]);
        $this->dispatch('setSearching' ,$this->keyword );
    }


    public function render(): View
    {
        return view('theme::widgets.search-widget',[
            'placeholder' => ThemeController::$models[$this->model] ?? ''
        ]);
    }
}
