    <section class="slider_section slider_s_one mb-60 mt-20">
        <div class="container">
            <div class="row">
            <div class="s_banner col-lg-3 col-md-12">
                    <!--banner area start-->
                    <div class="sidebar_banner_area">
                    <?php foreach($banners as $banner) { ?>    
                    <figure class="single_banner mb-20 ">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="<?=ASSETS?>/img/bg/<?=$banner->image?>" alt=""></a>
                            </div>
                        </figure>
                    
                    <?php } ?>
                </div>
                    <!--banner area end-->
            </div>
            
            <div class="col-lg-9 slider col-md-12">
                <div class="swiper-container gallery-top">
                    <div class="slider_area swiper-wrapper">
                    <?php foreach($sliders as $slider){ ?>    
                    <div class="single_slider swiper-slide d-flex align-items-center" data-bgimg="/uploads/slider/<?=($slider->image)?>">
                            <div class="slider_content">
                                <h3><?=$slider->title?></h3>
                                <h1><?=$slider->sub_title?></h1>
                                <p>discount <span> -30% off</span> this week</p>
                                <a class="button" href="shop.html">DISCOVER NOW</a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <!-- Add Arrows -->

                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    
                </div>

            </div>
               
            </div>
        </div>
    </section>