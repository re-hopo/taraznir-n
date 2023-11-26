
<div class="col-lg-12 col-md-12 col-sm-12 form-group">
    <textarea wire:model="message" placeholder="@lang('theme::theme.form.request_body_place')"></textarea>
    @error('message') <strong>{{$message}}</strong> @enderror
</div>
