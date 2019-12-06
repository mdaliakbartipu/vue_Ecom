  <?php


?>
  <section class=" mt-3 mb-4 slider-rpt-2">
    	<div class="container">

    		<div class="row">
    			<div class="s_banner col-lg-3 col-md-12">
    				<!--banner area start-->
    				<div class="sidebar_banner_area">
    					<figure class="single_banner ">
    						<div class="banner_thumb mb-2 para-one">
    							<a href="shop.html"><img src="<?=ASSETS?>/img/bg/ad1.png" alt=""></a>
    						</div>
    					</figure>
    					<figure class="single_banner ">
    						<div class="banner_thumb mb-2 para-one">
    							<a href="shop.html"><img src="<?=ASSETS?>/img/bg/ad2.png" alt=""></a>
    						</div>
    					</figure>
    					<figure class="single_banner ">
    						<div class="banner_thumb para-one">
    							<a href="shop.html"><img src="<?=ASSETS?>/img/bg/ad3.png" alt=""></a>
    						</div>
    					</figure>
    				</div>
    				<!--banner area end-->
    			</div>


    			<div class="col-lg-9 col-md-12">
    			
    			<!-- Add Arrows -->

				<div id="container">
  <ul id="slides">
    
  
  <?php
  foreach($sliders as $slider):
    $img_one = file_exists(ASSETS."/.uploads/slider/".$slider->image_1)? 
                        ASSETS.'/.uploads/slider/'.$slider->image_1 :
                        ASSETS.'/.img/slider/'.$slider->image_1;
    $img_two = file_exists(ASSETS."/.uploads/slider/".$slider->image_2)? 
                        ASSETS.'/.uploads/slider/'.$slider->image_2 :
                        ASSETS.'/.img/slider/'.$slider->image_2 ; 
  ?>
  <li class="slide">
      <div class="slide-partial slide-left"><img src="<?=$img_one?>"/></div>
      <div class="slide-partial slide-right"><img src="<?=$img_two?>"></div>
       <h3 class="title1 title"><span class="title-text"><?=$slider->title?></span></h3><br>
      <h1 class="title"><span class="title-text"><?=$slider->sub_title?></span></h1>
      <p class="title3 title "><span class="title-text">discount <b style="color:red;"><?=$slider->discount?>%</b> off this week </span></p>
      <a href="<?=$slider->slug?>" class="text-uppercase title4 wow flipInX"> discover Now </a>
    </li>
<?php
endforeach;

?>
 



  </ul>
  <ul id="slide-select">

    <li class="selector"></li>
    <li class="selector"></li>
    <li class="selector"></li>
    
    
  </ul>
</div><a class="codepen-link" href="" target="_blank" style="background-image: url('<?=ASSETS?>/img/ftIcon.png');"></a>
				
    			</div>
    		

    		</div>

    	</div>
    </section>