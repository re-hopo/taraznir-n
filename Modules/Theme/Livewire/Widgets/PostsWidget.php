<?php

namespace Modules\Theme\Livewire\Widgets;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Http\Controllers\ThemeController;

class PostsWidget extends Component
{
    protected ?string $model  = '';
    protected ?string $object = '';
    protected $items;

    public function mount($model ,$object): void
    {
        $this->model  = $model;
        $this->object = $object;
    }

    public function render(): View
    {

        $this->items = Helpers::commonRedisGetQuery(
            strtolower($this->model)."recent",
            $this->object,
            ['category' ,'meta' ,'media'],
            config('theme.recent_limit' ,10)
        );

        return view('theme::widgets.posts-widget',[
            'title' => ThemeController::$models[$this->model."s"] ?? ""
        ]);
    }
}
