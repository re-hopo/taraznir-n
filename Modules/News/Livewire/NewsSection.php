<?php

namespace Modules\News\Livewire;

use Livewire\Component;
use Modules\News\Models\News;
use Modules\Theme\Helpers\Helpers;

class NewsSection extends Component
{
    public function render()
    {
        $items = Helpers::redisHandler( 'news_section' ,function (){
            return News::with(['category' ,'meta'])
                ->activeScope()
                ->orderBy('chosen')
                ->limit(config('news::section_limit' ,3))
                ->get();
        });

        return view('news::news-section',[
            'items' => $items
        ]);
    }
}
