<div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <input wire:model="email" type="email" name="email" placeholder="@lang('theme::theme.form.enter_your_email')*" >
    @error('email') <span>{{$message}}</span> @enderror
</div>
