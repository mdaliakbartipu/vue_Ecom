<section class=" mt-3 mb-4 slider-rpt-2">
	<div class="container">

		<div class="row">
			<div class="s_banner col-lg-3 col-md-12">
				<!--banner area start-->
				<div class="sidebar_banner_area">
					<?php foreach ($banners as $banner) :
						$image = file_exists(ltrim(ASSETS, '/') . "/.uploads/banners/" . $banner->image) ?
							ASSETS . '/.uploads/banners/' . $banner->image : ASSETS . '/img/banners/' . $banner->image;
						?>
						<addvertise slug="<?= $banner->slug ?>" image="<?= $image ?>"> </addvertise>
					<?php endforeach; ?>
				</div>

			</div>

			<!--banner area end-->


			<!-- Slider Start -->
			<div class="col-lg-9 col-md-12">
				<!-- Add Arrows -->
				<div id="container">
					<ul id="slides">
						<?php foreach ($sliders as $slider) :
							$img_one = file_exists(ltrim(ASSETS, '/') . "/.uploads/sliders/" . $slider->image_1) ?
								ASSETS . '/.uploads/sliders/' . $slider->image_1 : ASSETS . '/img/sliders/' . $slider->image_1;
							$img_two = file_exists(ltrim(ASSETS, '/') . "/.uploads/sliders/" . $slider->image_2) ?
								ASSETS . '/.uploads/sliders/' . $slider->image_2 : ASSETS . '/img/sliders/' . $slider->image_2;  ?>

							<slider-image title="<?= $slider->title ?>" subtitle="<?= $slider->sub_title ?>" imgleft="<?= $img_one ?>" imgright="<?= $img_two ?>" slug="<?= $slider->slug ?>" discount="<?= $slider->discount ?>">
							</slider-image>
						<?php endforeach; ?>

					</ul>
					<ul id="slide-select">
						<?php for ($i = 0, $count = count($sliders); $i < $count; $i++) : ?>
							<li class="selector"></li>
						<?php endfor; ?>

					</ul>
				</div>
				<a class="codepen-link" href="" target="_blank" style="background-image: url('<?= ASSETS ?>/img/ftIcon.png');"></a>
			</div>
			<!-- Slider END -->

		</div>

	</div>
</section>