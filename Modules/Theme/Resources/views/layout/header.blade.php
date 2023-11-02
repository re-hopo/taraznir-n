
<header class="main-header header-style-two">
<Script src="static/app.js" strategy={"afterInteractive"} />
<div class="header-lower">
    <div class="header-wrapper">
        <div class="inner-container d-flex justify-content-between align-items-center" style={{gap:10}}>
            <div class="logo-box d-flex align-items-center">
                <div class="nav-toggle-btn a-nav-toggle navSidebar-button" onClick={navHandler}>
                    <span class="hamburger">
                      <span class="top-bun" />
                      <span class="meat" />
                      <span class="bottom-bun" />
                    </span>
                </div>
                <div class="logo">
                    <a href="/">
                        <Image
                            src="/images/logos/taraznir-logo-0.5x.png"
                            alt="taraznir logo"
                            width="160"
                            height="60"
                        />
                    </a>
                </div>
            </div>
            <div class="middle-box">
                <div class="upper-box">
                    <div class="info-list">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="left-top-middle">
                                <a class="user-box flaticon-user-3" href="/profile" />
                                <div class="like-box">
                                    <a class="user-box flaticon-heart" href="/profile/fave" />
                                    <span class="total-like">0</span>
                                </div>
                                <div class="cart-box-two">
                                    <a class="flaticon-shopping-bag" href="/product" />
                                    <span class="total-like">0</span>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <span class="icon">
                                        <span class="flaticon-checked"></span>
                                    </span>
                                    <a href="/service/certification" style={{color:'#000' ,fontWeight:'bold'}}>
                                        تاییدیه ارت اداره کار
                                    </a>
                                </li>
                                <li>
                                    <span class="icon">
                                        <span class="flaticon-time"></span>
                                    </span>
                                    {(findMetaValueByKey(options.theme_settings.meta ,'work_time'))}
                                </li>
                                <li>
                                    <span class="icon">
                                        <span class="flaticon-location"></span>
                                    </span>
                                    {(findMetaValueByKey(options.theme_settings.meta ,'header_address'))}
                                </li>
                                <li>

                                    <span class="icon">
                                        <span class="flaticon-phone-call"></span>
                                    </span>
                                    {(findMetaValueByKey(options.theme_settings.meta ,'header_phone_number'))}
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="nav-outer d-flex justify-content-between align-items-center flex-wrap">
                    <div class="options-box d-flex align-items-center">
                        <div class="search-box-two">
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <input
                                        type="search"
                                        name="search-field"
                                        defaultValue=""
                                        placeholder="جستجو"
                                    />
                                    <button type="submit">
                                        <span class="icon flaticon-search" />
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="mobile-nav-toggler">
                            <a class="user-box flaticon-user-3" href="/profile" />
                            <div class="like-box">
                                <a class="user-box flaticon-heart" href="/profile/fave" />
                                <span class="total-like">0</span>
                            </div>
                            <div class="cart-box-two">
                                <a class="flaticon-shopping-bag" href="/product" />
                                <span class="total-like">0</span>
                            </div>

                            <span class="icon flaticon-menu" />
                        </div>
                    </div>
                    <nav class="main-menu show navbar-expand-md">
                        <div class="navbar-header">
                            <button
                                class="navbar-toggler"
                                type="button"
                                data-toggle="collapse"
                                data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <span class="icon-bar" />
                                <span class="icon-bar" />
                                <span class="icon-bar" />
                            </button>
                        </div>
                        <div
                            class="navbar-collapse collapse clearfix"
                            id="navbarSupportedContent"
                        >
                            {menuCreator(options ,'header_menu' ,'navigation clearfix')}
                        </div>
                    </nav>
                </div>
            </div>
            <div class="auth-button-box text-center right-header">
                <a href="/registration" class="theme-btn btn-style-one">
                    <span class="icon flaticon-right-arrow" />
                    ورود \ ثبت‌ نام
                </a>
            </div>
        </div>
    </div>
</div>
<div class="sticky-header">
    <div class="auto-container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="/">
                    <Image
                        src="/images/logos/taraznir-logo-0.5x.png"
                        alt="taraznir logo"
                        width="160"
                        height="60"
                    />
                </a>
            </div>
            <div class="right-box">
                <nav class="main-menu">  </nav>
                <div class="mobile-nav-toggler">
                    <span class="icon flaticon-menu" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-menu">
    <div class="menu-backdrop" />
    <div class="close-btn">
        <span class="icon flaticon-multiply" />
    </div>
    <nav class="menu-box">
        <div class="nav-logo">
            <a href="/">
                <Image
                    src="/images/logos/taraznir-logo-0.5x.png"
                    alt="taraznir logo"
                    width="160"
                    height="60"
                />
            </a>
        </div>
        <div class="search-box">
            <form method="post" action="/profile">
                <div class="form-group">
                    <input
                        type="search"
                        name="search-field"
                        defaultValue=""
                        placeholder="SEARCH HERE"
                    />
                    <button type="submit">
                        <span class="icon flaticon-search-1" />
                    </button>
                </div>
            </form>
        </div>
            <div class="menu-outer" style={{height:'100%'}}>
                <Scrollbar style={{ width:"100%", height:'70%'}}>
                </Scrollbar>
            </div>
    </nav>
</div>
</header>

