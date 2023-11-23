<form wire:submit.defer="submit" >
    <div class="row clearfix">
        <x-theme::partials.forms.input-name />
        <x-theme::partials.forms.input-email />
        <x-theme::partials.forms.input-mobile />
        <x-theme::partials.forms.input-subject />
        <x-theme::partials.forms.input-message />
        <x-theme::partials.forms.submit-button :title="__('theme::theme.form.submit_request')"/>
    </div>
</form>

