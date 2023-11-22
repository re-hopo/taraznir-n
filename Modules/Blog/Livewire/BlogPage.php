<?php

namespace Modules\Blog\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Theme\Trait\CommonLivewireComponentTrait;

class BlogPage extends Component
{
    use CommonLivewireComponentTrait;

    public string $object = Blog::class;
    public string $model  = 'blog';
    public string $config = 'blog.section_limit';
    public $listeners     = ['setSearching' ,'setCategory'];
    public $categories;


    public function mount(): void
    {
        $this->limit      = config($this->config ,10);
        $this->categories = self::categories();
    }

    #[Layout('theme::layout.app')]
    public function render(): View
    {
        $this->renderQuery();
        return view('blog::blog-page');
    }
}
