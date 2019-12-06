<?php
$src = array(); $img = array();
// Getting promotions data and storing to variable for easy binding for later
foreach($promotions as $promotion):
    $img[] =  file_exists(ASSETS."/.uploads/promotions/".$promotion->image)? 
                ASSETS.'/.uploads/promotions/'.$promotion->image :
                ASSETS.'/.img/promotions/'.$promotion->image;
    $src[] = $promotion->slug;
endforeach; ?>

<div class="banner_area mb-55 ">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-6 col-md-6" >
                        <figure class="single_banner">
                            <div class="banner_thumb para-two">
                                   <a href="<?=$src[0]??'#'?>">
                                       <img width="100%" height="100%" class="banner-area-img-a" src="<?=$img[0]??null?>" alt="">
                                   </a>
                            </div>
                        </figure>
                    </div>
                    <div class="col"style="margin-left:-2px;" >
                        <div class="row">
                            <figure class="single_banner" style="height:100%;margin-top:-3px" >
                                <div class="banner_thumb">
                                    <a href="<?=$src[1]??'#'?>">
                                        <img width="400px" height="100%" class="banner-area-img-b" src="<?=$img[1]??null?>" alt="">
                                    </a>
                                </div>
                            </figure>      
                        </div>

                        <div class="row">
                            <figure class="single_banner last-day-10">
                                <div class="banner_thumb">
                                    <a href="<?=$src[2]??'#'?>">
                                        <img width="400px" height="100%" class="banner-area-img-b" src="<?=$img[2]??null?>" alt="">
                                    </a>
                                </div>
                            </figure>      
                        </div>
                    </div>
                    
                    <div class="col" style="margin-left:-2.8px;">
                    <figure class="single_banner">
                            <div class="banner_thumb para-two">
                                <a href="<?=$src[3]??'#'?>">
                                     <img  width="400px" width="100%" height="100%" class="banner-area-img-c" src="<?=$img[3]??null?>" alt="">
                                </a>
                            </div>
                        </figure>
                    </div>

                </div>
            </div>
        </div>
