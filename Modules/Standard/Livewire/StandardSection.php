<?php

namespace Modules\Standard\Livewire;

use Livewire\Component;
use Modules\Standard\Models\Standard;
use Modules\Theme\Helpers\Helpers;

class StandardSection extends Component
{

    public function render()
    {
        $items = Helpers::redisHandler( 'standard_section' ,function (){
            return
                Standard::with(['category' ,'meta' ,'media'])
                    ->activeScope()
                    ->orderBy('chosen' ,'DESC')
                    ->limit(config('service::section_limit' ,12))
                    ->get();
        });
        return view('standard::standard-section',[
            'items' => $items
        ]);
    }
}
