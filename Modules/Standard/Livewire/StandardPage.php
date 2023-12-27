<?php

namespace Modules\Standard\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Standard\Models\Standard;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Category;
class StandardPage extends Component
{
    public $categories ,$items;


    public function mount(): void
    {
        $this->items      = Helpers::redisHandler( "standards" ,function (){
            return Standard::with(['category'])->get();
        });
        $this->categories = Helpers::redisHandler( "standard:categories" ,function (){
            return Category::with('standard')->where('model' ,'standard')->get();
        });
    }

    #[Layout('theme::layout.app')]
    public function render(): View
    {
        return view('standard::standard-page',[
            'seo' => Helpers::mainPagesSEO()
        ]);
    }
}
