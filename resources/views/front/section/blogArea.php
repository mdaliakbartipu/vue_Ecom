 <div class="banner_area banner_style2 mb-55">
            <div class="container">
                <div class="row">

                <!-- Start of testimonial section -->

                    <div class="col-lg-4 col-md-4 bg-gray">
					<h2 class="h1 pt-3" style="text-align:left">Testimonials</h2>
                        <figure class="single_banner" style="background: url('<?=ASSETS?>/img/8-bgclient.png'); background-size:cover; background-size: cover;width: 100%;background-position: center;">
                        
                            <div class="owl-carousel owl-theme" >
            
   <?php foreach($testimonials as $testimonial): ?>  
        <div class="item gif  text-center" >
              <div class="gif_text">
                    <p class=" text-justify pt-3 pb-3 pl-4 pr-4 "><?=$testimonial->message?></p>
                    <div class="profile_img float-left" style="margin-bottom: 1em">
                      <img src="<?=file_exists(ltrim(ASSETS, '/').'/.uploads/testimonials/'.$testimonial->image)?ASSETS.'/.uploads/testimonials/'.$testimonial->image:ASSETS.'/img/testimonials/'.$testimonial->image?>" alt="" />
                    </div>
                    <div class="author_item" >
                      <span><?=$testimonial->name?>
                        <p style="font-size:11px"><?=$testimonial->designation?></p>
                      </span>
                    </div>
                </div>
          </div>
   <?php endforeach; ?>

         
                              </div>						
			             </figure>
                    </div>


                    <!-- End of testimolials section -->

<!-- Blog Section -->

                    <div class="col-lg-8 col-md-8">
                      <?php include('blogs.php'); ?>
                    </div>

                   
                </div>
            </div>
        </div>