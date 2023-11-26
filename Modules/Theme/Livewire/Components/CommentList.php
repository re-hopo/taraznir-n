<?php

namespace Modules\Theme\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Models\Comment;

class CommentList extends Component
{
    public $items;

    public function render(): View
    {
        $this->items = Comment::with('children')
            ->where('parent_id' ,0 )
            ->get();

        return view('theme::components.comment-list');
    }
}
