<div class="comments-area" xmlns:x-thems="http://www.w3.org/1999/html">
    <div class="group-title" dir="rtl">
        <h4>
            @lang('theme::theme.comment.comments')
            <span>(04)</span>
        </h4>
    </div>


    <x-theme::comment-index :comments="$this->items" :depth="0" />

</div>
