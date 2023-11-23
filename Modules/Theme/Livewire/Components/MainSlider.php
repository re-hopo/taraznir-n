<?php

namespace Modules\Theme\Livewire\Components;

use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;

class MainSlider extends Component
{
    public function render()
    {
        $items = Helpers::redisHandler( 'theme:slider' ,function (){
            return
                Option::with(['category' ,'meta' ,'media'])
                    ->whereHas('category' ,function ($query){
                        $query->where('slug' ,'main-slider');
                    })->get();
        });

        return view('theme::components.main-slider',[
            'items' => $items
        ]);
    }
}
