<?php

namespace Modules\Theme\Trait;



use JetBrains\PhpStorm\NoReturn;
use Livewire\WithPagination;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Category;

trait CommonLivewireComponentTrait
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';
    public int $limit       = 10;
    public string $order_by = 'ASC';
    public ?string $search  = '';
    public ?int $category   = 0;
    protected $items;

    public function renderQuery(): void
    {
        if(!$this->search && !$this->category)
            $this->items =
                Helpers::redisHandler( "$this->model-items" ,function (){
                    return
                        $this->object::with($this->with)
                            ->activeScope()
                            ->orderBy('created_at' ,$this->order_by)
                            ->paginate($this->limit);
                });
    }

    public function categories()
    {
       return
           Helpers::redisHandler( "$this->model-categories" ,function (){
                return Category::with($this->model)->where('model' ,$this->model)->get();
            });
    }


    #[NoReturn]
    public function setQuery(): void
    {
        $query = $this->object::with('category');

        if($this->search)
            $query
                ->whereIn('id',
                    $this->object::search($this->search)->get()->pluck('id')->toArray()
                );

        if($this->category)
            $query
                ->whereHas('category' ,function ($query){
                    $query
                        ->where('model' ,$this->model)
                        ->where('id'    ,$this->category);
                });

        $query->orderBy('created_at' ,$this->order_by);
        $this->items = $query->paginate($this->limit);
        $this->resetPage();
    }

    #[NoReturn]
    public function setSearching($keyword): void
    {
        $this->search = $keyword;
        $this->setQuery();
    }

    #[NoReturn]
    public function setCategory($categoryID): void
    {
        $this->category = $categoryID;
        $this->setQuery();
    }







}
