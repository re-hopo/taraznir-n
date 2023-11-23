<div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <input wire:model="phone" type="text" name="phone" placeholder="@lang('theme::theme.form.enter_your_mobile')" >
    @error('phone') <span>{{$message}}</span> @enderror
</div>
