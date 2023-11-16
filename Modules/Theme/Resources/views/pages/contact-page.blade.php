@php use \Modules\Theme\Helpers\Helpers; @endphp
@section('seo')
    {!! Helpers::seoTagsGenerator( $seo ,'about' ,' تارازنیر | تماس با ما') !!}
@endsection


<div>
    <x-theme::breadcrumbs :main="'تماس با ما'"  />

    <div class="contact-page-section">
        <div class="auto-container">

            <div class="row clearfix" dir="rtl">
                <div class="info-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <div class="info-box">
                            <div class="box-inner d-flex align-items-center">
                                <div class="icon flaticon-email-1"></div>
                                <div class="content">
                                    <strong>آدرس ایمیل</strong>
                                    <a href="mailto:info@taraznir.com">info@taraznir.com</a><br>
                                    <a href="mailto:ehsan@taraznir.com">ehsan@taraznir.com</a>
                                </div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="box-inner d-flex align-items-center">
                                <div class="icon flaticon-map"></div>
                                <div class="content">
                                    <strong>آدرس دفتر</strong>
                                    <div class="text">تهران-خیابان فلسطین جنوبی -مابین لبافی نژاد و جمهوری - پلاک 106- طبقه سوم-واحد 9</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="box-inner d-flex align-items-center">
                                <div class="icon flaticon-call"></div>
                                <div class="content">
                                    <strong>شماره تلفن</strong>
                                    <a href="tel:+98021-66467362">021-66467362</a><br>
                                    <a href="tel:+98021-66467148">021-66467148</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="map-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="map-outer">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1620.1199112291151!2d51.40134959326518!3d35.695715575952015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e010853e06c4d%3A0xde5b53a6a003bdf4!2sSolaris%20Clothing!5e0!3m2!1sen!2s!4v1669453300593!5m2!1sen!2s" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-boxed">
                <div class="title-box" dir="rtl">
                    <h3>فرم ارتباط با ما</h3>
                    <div class="text">
                        از نشانی ایمیل شما استفاده تبلیغاتی نمیشود.
                    </div>
                </div>
                <div class="contact-form">
                    <livewire:theme::forms.contact-form />
                </div>
            </div>
        </div>
    </div>

</div>

