<div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <input wire:model="name" type="text" name="name" placeholder="@lang('theme::theme.form.enter_your_name')" >
    @error('name') <span>{{$message}}</span> @enderror
</div>
