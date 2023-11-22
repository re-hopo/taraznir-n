<div class="error-section">
    <div class="auto-container">
        <div class="content">
            @if('post' === $this->type)
                <h1>404</h1>
                <h2>Oops... It looks like you ‘re lost !</h2>
                <div class="text">Oops! The page you are looking for does not exist. It might have been moved or deleted.</div>
                <div class="button-box text-center">
                    <a wire:click="clearFilter()" class="theme-btn btn-style-one">
                        حذف فیلتر
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
