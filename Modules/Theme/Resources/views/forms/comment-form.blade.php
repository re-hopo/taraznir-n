<div class="comment-form">
    <div>
        <h3 dir="rtl">@lang('theme::theme.comment.title')</h3>
        @if($this->parent_id)
            <div class="reply-to">
                <p>
                    @lang('theme::theme.comment.send_to') : <span>@</span>{{$this->getParentName()}}
                </p>
                <a wire:click="cancelReply()" href="javascript:void(0)">
                    @lang('theme::theme.comment.cancel_to')
                </a>
            </div>
        @endif
    </div>
    <form wire:submit.defer="submit" >
        <div class="row clearfix" dir="rtl">

            @if(!auth()->check())
                <x-theme::partials.forms.input-name />
                <x-theme::partials.forms.input-email />
                <x-theme::partials.forms.input-mobile />
            @endif

            <x-theme::partials.forms.input-message />
            <x-theme::partials.forms.submit-button :title="__('theme::theme.form.submit_comment')"/>

        </div>
    </form>
</div>

