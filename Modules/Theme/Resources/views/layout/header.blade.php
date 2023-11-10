@php use \Modules\Theme\Helpers\Helpers; @endphp
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
                                        {{Helpers::getMetaValueByKey( $options ,'work_time')}}
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <span class="flaticon-location"></span>
                                        </span>
                                        {{Helpers::getMetaValueByKey( $options ,'header_address')}}
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <span class="flaticon-phone-call"></span>
                                        </span>
                                        {{Helpers::getMetaValueByKey( $options ,'header_phone_number')}}
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
                                    @if( !empty( $menu->items ) )
                                        @foreach($menu->items as $item)
                                            @php
                                                $menu_name = ltrim( $item['data']['url'] ,'/').'-menu';
                                            @endphp
                                            <li
                                                class="{{!empty( $item['children'] ) ? 'dropdown' :''}}
                                                {{Helpers::returnValueIsTrue( $item ,'children' ,'menu-item-has-children')}}
                                                {{Helpers::checkCurrentPage( $item['data']['url'] )}} {{$menu_name}}"
                                            >
                                                @if( !empty( Helpers::indexChecker( $item ,'data' )) )
                                                    <a
                                                        href="{{$item['data']['url'] }}"
                                                        target="{{$item['data']['target'] }}"
                                                    >
                                                        {{ $item['label']}}
                                                    </a>

                                                    @if( !empty( $item['children'] ) )
                                                        <ul>
                                                            @foreach( $item['children'] as $child_1 )
                                                                <li>
                                                                    @if( !empty(Helpers::indexChecker( $child_1 ,'data' )) )
                                                                        <a
                                                                            href="{{ $child_1['data']['url'] }}"
                                                                            target="{{ $child_1['data']['target'] }}"
                                                                        >
                                                                            {{ $child_1['label'] }}
                                                                        </a>

                                                                        @if( !empty( $child_1['children'] ) )
                                                                            <ul>
                                                                                @foreach(  $child_1['children'] as $child_2 )
                                                                                    <li>
                                                                                        @if( !empty(Helpers::indexChecker( $child_2 ,'data' )) )
                                                                                            <a
                                                                                                href="{{ $child_2['data']['url'] }}"
                                                                                                target="{{ $child_2['data']['target'] }}"
                                                                                            >
                                                                                                {{ $child_2['label'] }}
                                                                                            </a>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    @endif

                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    @endif

                                                @endif
                                            </li>
                                        @endforeach
                                    @endif

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

