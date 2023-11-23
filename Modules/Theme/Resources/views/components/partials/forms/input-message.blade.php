<div class="col-lg-12 col-md-12 col-sm-12 form-group">
    <textarea wire:model="text" class="" name="message" placeholder="@lang('theme::theme.form.request_body_place')*"></textarea>
    @error('text') <span>{{$message}}</span> @enderror
</div>
