
<form wire:submit.defer="submit" >
    <div class="row clearfix">

        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <input wire:model="name" type="text" name="name" placeholder="نام خود را وارد کنید." >
            @error('name') <span>{{$message}}</span> @enderror
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <input wire:model="email" type="email" name="email" placeholder="نشانی ایمیل خود را وارد کنید*" >
            @error('email') <span>{{$message}}</span> @enderror
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <input wire:model="phone" type="text" name="phone" placeholder="شماره تماس خود را وارد کنید." >
            @error('phone') <span>{{$message}}</span> @enderror
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
            <input wire:model="subject" type="text" name="subject" placeholder=" عنوان پیام خود را وارد کنید." >
            @error('subject') <span>{{$message}}</span> @enderror
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <textarea wire:model="text" class="" name="message" placeholder="محل نوشتن متن درخواست*"></textarea>
            @error('text') <span>{{$message}}</span> @enderror
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
            <div class="buttons-box">
                <button type="submit" class="theme-btn btn-style-one">
                    ارسال درخواست
                </button>
            </div>
        </div>

    </div>
</form>

