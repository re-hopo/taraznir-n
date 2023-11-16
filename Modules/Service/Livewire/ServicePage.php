<?php

namespace Modules\Service\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Service\Models\Service;
use Modules\Theme\Helpers\Helpers;

class ServicePage extends Component
{

    #[Layout('theme::layout.app')]
    public function render(): View
    {
        $items =(object) Helpers::redisHandler( 'services' ,function (){
            return
                Service::with(['category' ,'meta' ,'media'])
                    ->activeScope()
                    ->orderBy('chosen' ,'DESC')
                    ->get();
        });
        return view('service::service-page' ,[
            'seo'   => Helpers::mainPagesSEO(),
            'items' => $items,
        ]);
    }
}
