<?php

namespace Modules\Catalog\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Catalog\Models\Catalog;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Category;
class CatalogPage extends Component
{
    public $categories ,$items;


    public function mount(): void
    {
        $this->items      = Helpers::redisHandler( "catalogs" ,function (){
            return Catalog::with(['category'])->get();
        });
        $this->categories = Helpers::redisHandler( "catalog:categories" ,function (){
            return Category::with('catalog')->where('model' ,'catalog')->get();
        });
    }

    #[Layout('theme::layout.app')]
    public function render(): View
    {
        return view('catalog::catalog-page',[
            'seo' => Helpers::mainPagesSEO()
        ]);
    }
}
