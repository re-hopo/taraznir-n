<div className="sidebar-widget-two most-view-box mt-40 sidebar-widget-two post-widget">
    <div className="sidebar-title-two  slider-widget-title">
        <div className="navigation">
            <div className="swiper-nav-icon"
            // @ts-ignore
            onClick={()=>swiperInstance.slidePrev(500)}
            >
            <span className="flaticon-left"></span>
        </div>

        <div className="swiper-nav-icon"
        // @ts-ignore
        onClick={()=>swiperInstance.slideNext(500)}
        >
        <span className="flaticon-right"></span>
    </div>
</div>
<h5>Hot Topics</h5>
</div>

<Swiper
    className="single-item-carousel"
    modules={[Autoplay, Keyboard, Pagination, Scrollbar, Zoom]}
    autoplay={false}
    zoom={true}
    loop={true}
    freeMode={true}
// @ts-ignore
onSlideChangeTransitionEnd={()=>setActiveSlide(swiperInstance.activeIndex)}
onSwiper={(swiper) => setSwiperInstance(swiper)}
>
<SwiperSlide>
    <div className="post">
        <div className="thumb">
            <div className="post-number">01</div>
            <a href="news-detail.html">
                <img src="/images/resource/post-thumb-1.jpg" alt="" />
            </a>
        </div>
        <div className="category">Sports</div>
        <h6>
            <a href="news-detail.html">
                Budget Issues Force The Our To Be
            </a>
        </h6>
        <div className="meta-post-2-style">
            <div className="meta-post-date"><span>April 26, 2020</span></div>
        </div>
    </div>
    <div className="post">
        <div className="thumb">
            <div className="post-number">01</div>
            <a href="news-detail.html">
                <img src="/images/resource/post-thumb-1.jpg" alt="" />
            </a>
        </div>
        <div className="category">Sports</div>
        <h6>
            <a href="news-detail.html">
                Budget Issues Force The Our To Be
            </a>
        </h6>
        <div className="meta-post-2-style">
            <div className="meta-post-date"><span>April 26, 2020</span></div>
        </div>
    </div>

</SwiperSlide>
<SwiperSlide>
    <div className="post">
        <div className="thumb">
            <div className="post-number">01</div>
            <a href="news-detail.html">
                <img src="/images/resource/post-thumb-1.jpg" alt="" />
            </a>
        </div>
        <div className="category">Sports</div>
        <h6>
            <a href="news-detail.html">
                Budget Issues Force The Our To Be
            </a>
        </h6>
        <div className="meta-post-2-style">
            <div className="meta-post-date"><span>April 26, 2020</span></div>
        </div>
    </div>

</SwiperSlide>
</Swiper>
</div>

