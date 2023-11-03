<header class="main-header header-style-two">

    <div class="header-lower">
        <div class="header-wrapper">
            <div class="inner-container d-flex justify-content-between align-items-center" style="gap:10px">

                <div class="logo-box d-flex align-items-center">
                    <div class="nav-toggle-btn a-nav-toggle navSidebar-button">
                        <span class="hamburger">
                          <span class="top-bun"></span>
                          <span class="meat"></span>
                          <span class="bottom-bun"></span>
                        </span>
                    </div>
                    <div class="logo">
                        <a href="/">
                            <img
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
                                    <a class="user-box flaticon-user-3" href="/profile"></a>
                                    <div class="like-box">
                                        <a class="user-box flaticon-heart" href="/profile/fave"></a>
                                        <span class="total-like">0</span>
                                    </div>
                                    <div class="cart-box-two">
                                        <a class="flaticon-shopping-bag" href="/product"></a>
                                        <span class="total-like">0</span>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <span class="icon">
                                            <span class="flaticon-checked"></span>
                                        </span>
                                        <a href="/service/certification" style="color:#000;font-weight:bold">
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
                                            <span class="icon flaticon-search"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="mobile-nav-toggler">
                                <a class="user-box flaticon-user-3" href="/profile"></a>
                                <div class="like-box">
                                    <a class="user-box flaticon-heart" href="/profile/fave"></a>
                                    <span class="total-like">0</span>
                                </div>
                                <div class="cart-box-two">
                                    <a class="flaticon-shopping-bag" href="/product"></a>
                                    <span class="total-like">0</span>
                                </div>
                                <span class="icon flaticon-menu"></span>
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
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="dropdown"><a href="#">Home</a>
                                        <ul>
                                            <li><a href="index.html">Homepage One</a></li>
                                            <li><a href="index-2.html">Homepage Two</a></li>
                                            <li><a href="index-3.html">Homepage Three</a></li>
                                            <li class="dropdown"><a href="#">Header Styles</a>
                                                <ul>
                                                    <li><a href="index.html">Header Style One</a></li>
                                                    <li><a href="index-2.html">Header Style Two</a></li>
                                                    <li><a href="index-3.html">Header Style Three</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About</a></li>
                                    <li class="dropdown"><a href="#">Shop</a>
                                        <ul>
                                            <li><a href="shop.html">Our Products</a></li>
                                            <li><a href="shop-detail.html">Product Single</a></li>
                                            <li><a href="cart.html">Shoping Cart</a></li>
                                            <li><a href="checkout.html">CheckOut</a></li>
                                            <li><a href="register.html">Register</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Our Blog</a></li>
                                            <li><a href="blog-detail.html">Blog Single</a></li>
                                            <li><a href="not-found.html">Not Found</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="auth-button-box text-center right-header">
                    <a href="/registration" class="theme-btn btn-style-one">
                        <span class="icon flaticon-right-arrow"></span>
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
                    <a href="index.html" title=""><img src="images/logo-small.png" alt="" title=""></a>
                </div>

                <div class="right-box">
                    <nav class="main-menu">
                    </nav>
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                </div>

            </div>
        </div>
    </div>


    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="images/mobile-logo.png" alt="" title=""></a></div>
            <!-- Search -->
            <div class="search-box">
                <form method="post" action="contact.html">
                    <div class="form-group">
                        <input type="search" name="search-field" value="" placeholder="SEARCH HERE" required>
                        <button type="submit"><span class="icon flaticon-search-1"></span></button>
                    </div>
                </form>
            </div>
            <div class="menu-outer"></div>
        </nav>
    </div>
</header>

