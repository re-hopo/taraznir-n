<?php

namespace Modules\Blog\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Blog\Models\Blog;
use Modules\Theme\Helpers\Helpers;

class BlogPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Layout('theme::layout.app')]
    public function render()
    {
        $items =(object) Helpers::redisHandler( 'blogs' ,function (){
            return
                Blog::with(['category' ,'meta' ,'media'])
                    ->activeScope()
                    ->orderBy('chosen' ,'DESC')
                    ->paginate(config('blog.section_limit' ,10));
        });

        return view('blog::blog-page',[
            'items' => $items
        ]);
    }
}
