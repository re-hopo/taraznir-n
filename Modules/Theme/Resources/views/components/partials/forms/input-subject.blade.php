<div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <input wire:model="subject" type="text" placeholder="@lang('theme::theme.form.enter_your_subject')" >
    @error('subject') <strong>{{$message}}</strong> @enderror
</div>
