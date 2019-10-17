    <div class="home_section_bg">

        <?php include('collection.php') ?>
        <!--product area end-->

        <!--banner area start-->
        <div class="banner_area mb-55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="<?= ASSETS ?>/../uploads/promotion/<?= $promotions[0]->image??null ?>" alt=""></a>
                                <a href="shop.html"><img src="<?= ASSETS ?>/../uploads/promotion/<?= $promotions[1]->image??null ?>" alt=""></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-6 abc">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="<?= ASSETS ?>/../uploads/promotion/<?= $promotions[2]->image??null ?>" alt=""></a>
                            </div>
                        </figure>

                        <div class="row">
                            <div class="col-md-6 bcd">
                                <figure class="single_banner">
                                    <div class="banner_thumb">
                                        <div class="p2rightbottom_container">
                                            <div class="flex-item">
                                                <img src="<?= ASSETS ?>/../uploads/promotion/<?= $promotions[3]->image??null ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>

                            <div class="col-md-6">
                                <figure class="single_banner">
                                    <div class="banner_thumb">
                                        <div class="p2rightbottom_container">
                                            <div class="flex-item">
                                                <img src="<?= ASSETS ?>/../uploads/promotion/<?= $promotions[4]->image??null ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--banner area end-->

        <!-Testimonial start-->
            <div class="banner_area banner_style2 mb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <h2 class="h1 pt-3" style="text-align:left">Testimonials</h2>
                            <figure class="single_banner" style="background: #F5F5F9 url('<?= ASSETS ?>/img/8-bgclient.png'); background-size:cover; background-size: cover;height:76%;width: 100%;background-position: center;">
                                <div class="owl-carousel owl-theme">
                                   <?php
                                    // dd($testimonials);
                                    foreach($testimonials as $testmonial){ ?>
            
                                    <div class="item gif  text-center">
                                        <div class="gif_text">
                                            <p class=" text-justify pt-4 pb-4 pl-4 pr-4 "><i class="fa fa-quote-left" aria-hidden="true"></i>
                                            <?=$testmonial->message??null?>    
                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                            </p>
                                            <div class="profile_img flote-left">
                                                <img src="uploads/testimonial/<?=$testmonial->image??null?>" alt="" />
                                            </div>
                                            <div class="author_item">
                                                <span><?=$testmonial->name??null?>
                                                    <p style="font-size:11px"><?=$testmonial->designation??null?></p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <?php } ?>

                                </div>
                            </figure>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <?php include('blogs.php');?>
                        </div>
                    </div>
                </div>
            </div>
            <!--Testimonial area end-->

            <!--product area start-->
            <!--product area end-->

    </div>