<div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <input wire:model="subject" type="text" name="subject" placeholder="@lang('theme::theme.form.enter_your_subject')" >
    @error('subject') <span>{{$message}}</span> @enderror
</div>
