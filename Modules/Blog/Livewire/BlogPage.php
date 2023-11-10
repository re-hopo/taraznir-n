<?php

namespace Modules\Blog\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Theme\Helpers\Helpers;

class BlogPage extends Component
{

    #[Layout('theme::layout.app')]
    public function render()
    {
        $blogs =(object) Helpers::redisHandler( 'blog-section' ,function (){
            return
                Blog::with(['category' ,'meta' ,'media'])
                    ->activeScope()
                    ->orderBy('chosen' ,'DESC')
                    ->limit(config('blog::section_limit' ,10))
                    ->get();
        });

        return view('blog::blog-page',[
            'items' => $blogs
        ]);
    }
}
