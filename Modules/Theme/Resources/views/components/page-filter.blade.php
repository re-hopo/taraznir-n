<div class="right-box d-flex">
    <div class="form-group">
        <select wire:model="order_by" wire:change="setQuery">
            <option value="ASC">جدیدترین</option>
            <option value="DESC">قدیمی‌ترین</option>
        </select>
    </div>
    <div class="form-group mx-2">
        <select wire:model="limit" wire:change="setQuery">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </select>
    </div>
</div>
