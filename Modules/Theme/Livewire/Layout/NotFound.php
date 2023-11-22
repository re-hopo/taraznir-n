<?php

namespace Modules\Theme\Livewire\Layout;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;
use Modules\Tutorial\Models\Tutorial;
use RyanChandler\FilamentNavigation\Models\Navigation;

class NotFound extends Component
{
    public ?string $type = '';

    public function mount($type): void
    {
        $this->type = $type;
    }

    public function clearFilter(): void
    {
        $this->dispatch('searching' ,null );
    }

    public function render(): View
    {
        return view('theme::layout/not-found');
    }
}
