<?php

namespace Modules\Gallery\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Gallery\Models\Gallery;
use Modules\Theme\Helpers\Helpers;

class GalleryPage extends Component
{
    public ?object $items = null;

    public function mount()
    {
        $this->items = Helpers::redisHandler( "galleries" ,function (){
            return Gallery::with(['media'])->get();
        });
    }


    #[Layout('theme::layout.app')]
    public function render():View
    {
        return view('gallery::gallery-page',[
            'seo' => Helpers::mainPagesSEO()
        ]);
    }
}
