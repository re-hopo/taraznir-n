<?php

namespace Modules\Standard\Livewire;

use Illuminate\View\View;
use Jorenvh\Share\Share;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Blog\Models\Blog;
use Modules\Standard\Models\Standard;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Option;
use Modules\Theme\Trait\CommonLivewireComponentTrait;

class StandardDetail extends Component
{
    use CommonLivewireComponentTrait;

    public string $object   = Standard::class;
    public string $model    = 'standard';
    protected $share = '';
    public $item ,$categories ,$options ,$next ,$previous;
    public function mount($slug): void
    {
        $this->item = Helpers::commonRedisFirstQuery(
            "standard:$slug",
           $this->object,
           ['category' ,'meta' ,'media'],
           ['slug' ,$slug]
        );

        if( !$this->item )
            abort(404);

        $this->previous = Helpers::redisHandler( "standard:previous-$slug",function (){
            return
                Standard::where('id' ,'<' ,$this->item->id)
                    ->orderBy('id' ,'DESC')
                    ->first();
        });

        $this->next = Helpers::redisHandler( "standard:next-$slug" ,function (){
            return
                Standard::where('id' ,'>' ,$this->item->id)
                    ->orderBy('id')
                    ->first();
        });

        $this->categories = self::categories();

        $this->options = Helpers::redisHandler( 'theme:options' ,function (){
            return
                Option::where('key' ,'theme_options')
                    ->with(['meta' ,'media'])
                    ->first();
        });


        $this->share = (new Share)->page(
            route('standard').$this->item->slug,
            $this->item->title,
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->getRawLinks();

    }


    #[Layout('theme::layout.app')]
    public function render(): View
    {
        return view('standard::standard-detail');
    }
}
