<div class="comments-area">
    <div class="group-title" dir="rtl">
        <h4>
            @lang('theme::theme.comment.comments')
            <span>({{is_countable($this->items) ? count($this->items) : ''}})</span>
        </h4>
    </div>

    <x-theme::comment.comment-index :comments="$this->items" :depth="0" />
</div>
