<div class="sidebar-widget-two search-box">
    <div class="widget-content">

        <form wire:submit="submit" class="form-group" dir="rtl" >
            <button type="submit">
                <span class="icon fa fa-search" ></span>
            </button>
            <input
                wire:model.defer="keyword"
                type="text"
                name="keyword"
                placeholder=" جستجوی {{$placeholder}} "
                autocomplete="off"
            />
            @if($this->keyword)
                <span wire:click="clearFilter()" class="icon fa fa-close" ></span>
            @endif
        </form>

    </div>
</div>
