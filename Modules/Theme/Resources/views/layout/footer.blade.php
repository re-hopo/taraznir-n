<footer class="main-footer style-two" dir="rtl">
    <div class="auto-container">
        <div class="widgets-section">
            <div class="row clearfix">
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <div class="logo">
                                    <a href="/">
                                        <img src="/images/logos/taraznir-logo-0.25x.png" alt="taraznir logo" width={158} height={41}/>
                                    </a>
                                </div>
                                <div class="text">
                                    {options.theme_settings.value}
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="subscribe-box">
                                <form method="post" action="/form/subscribe">
                                    <div class="form-group">
                                        <input
                                            type="email"
                                            name="search-field"
                                            placeholder="ایمیل خود را وارد کنید"
                                        />
                                        <button type="submit" class="theme-btn submit-btn flaticon-send"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h6>خدمات اصلی</h6>
                                {menuCreator(options ,'first_footer_menu' ,'page-list')}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h6>صفحات اصلی</h6>
                                {menuCreator(options ,'second_footer_menu' ,'page-list')}
                            </div>
                        </div>
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget call-us-information">
                                <h6>اطلاعات تماس</h6>
                                <ul>
                                    <li>
                                        <div class="inner">
                                            <span class="fa fa-map-marker"></span>
                                            <span class="call-text">
                                                {findMetaValueByKey(options.theme_settings.meta ,'footer_address')}
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner">
                                            <span class="fa fa-phone"></span>
                                            <div>
                                                {filterMetaByKey(options.theme_settings.meta ,'footer_phone').map( (phone:MetaType ,key:number) =>
                                                    <p key={key}> {phone.value} </p>
                                                )}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner">
                                            <span style="font-size: 15px" class="fa fa-envelope"></span>
                                            <span class="call-text">
                                                {findMetaValueByKey(options.theme_settings.meta ,'info_email')}
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="copyright">©
                     تمام حقوق برای <span> Taraznir</span> محفوظ است
                </div>
                <ul class="social-box">
                    {searchMetaByKeyword(options.theme_settings.meta ,'social_').map( (social:MetaType ,key:number) =>
                        isJsonString(social.value) && <li>
                            <a
                                href={ JSON.parse(social.value).value}
                                class={`fa ${JSON.parse(social.value).icon}`}
                            />
                        </li>
                    )}
                </ul>
                {menuCreator(options ,'third_footer_menu' ,'footer-bottom-nav')}
            </div>
        </div>
    </div>
</footer>
