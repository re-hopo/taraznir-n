@props([
    'title' => __('theme::theme.form.submit'),
])
<div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <input wire:model="email" type="email" placeholder="@lang('theme::theme.form.enter_your_email')" >
    @error('email') <strong>{{$message}}</strong> @enderror
</div>
