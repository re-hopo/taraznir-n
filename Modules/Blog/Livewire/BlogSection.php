<?php

namespace Modules\Blog\Livewire;

use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Theme\Helpers\Helpers;

class BlogSection extends Component
{
    public function render()
    {
        $blogs =(object) Helpers::redisHandler( 'blog:section' ,function (){
            return
                Blog::with(['category' ,'meta' ,'media'])
                    ->activeScope()
                    ->orderBy('chosen' ,'DESC')
                    ->limit(config('blog.section_limit' ,10))
                    ->get();
        });

        return view('blog::blog-section',[
            'items' => $blogs
        ]);
    }
}
