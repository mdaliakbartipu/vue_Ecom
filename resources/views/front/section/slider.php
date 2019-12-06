<section class=" mt-3 mb-4 slider-rpt-2">
    	<div class="container">

    		<div class="row">
    			<div class="s_banner col-lg-3 col-md-12">
    				<!--banner area start-->
    				<div class="sidebar_banner_area">	
						<?php foreach($banners as $banner):
						$image = file_exists(ASSETS."/.uploads/banners/".$banner->image)? 
									ASSETS.'/.uploads/banners/'.$banner->image :
									ASSETS.'/.img/banners/'.$banner->image;
						?>
						<figure class="single_banner ">
    						<div class="banner_thumb mb-2 para-one">
    							<a href="<?=$banner->slug?>"><img src="<?=$image?>" alt=""></a>
    						</div>
						</figure>
						<?php endforeach; ?>
    				</div>
    				<!--banner area end-->
    			</div>
    			<div class="col-lg-9 col-md-12">
    			
    			<!-- Add Arrows -->
				<div id="container">
	<ul id="slides">
		
	<?php foreach($sliders as $slider):
		$img_one = file_exists(ASSETS."/.uploads/sliders/".$slider->image_1)? 
							ASSETS.'/.uploads/sliders/'.$slider->image_1 :
							ASSETS.'/.img/sliders/'.$slider->image_1;
		$img_two = file_exists(ASSETS."/.uploads/sliders/".$slider->image_2)? 
							ASSETS.'/.uploads/sliders/'.$slider->image_2 :
							ASSETS.'/.img/sliders/'.$slider->image_2 ;  ?>
	<li class="slide">
		<div class="slide-partial slide-left"><img src="<?=$img_one?>"/></div>
		<div class="slide-partial slide-right"><img src="<?=$img_two?>"></div>
		<h3 class="title1 title"><span class="title-text"><?=$slider->title?></span></h3><br>
		<h1 class="title"><span class="title-text"><?=$slider->sub_title?></span></h1>
		<p class="title3 title "><span class="title-text">discount <b style="color:red;"><?=$slider->discount?>%</b> off this week </span></p>
		<a href="<?=$slider->slug?>" class="text-uppercase title4 wow flipInX"> discover Now </a>
	</li>
	<?php endforeach;?>

	</ul>
  <ul id="slide-select">

	<?php for($i=0, $count = count($sliders); $i < $count; $i++): ?>
		<li class="selector"></li>
	<?php endfor; ?>
	
  </ul>
</div><a class="codepen-link" href="" target="_blank" style="background-image: url('<?=ASSETS?>/img/ftIcon.png');"></a>
</div>
    		

    		</div>

    	</div>
    </section>