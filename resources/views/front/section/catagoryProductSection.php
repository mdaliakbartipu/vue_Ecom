<div class="product_page_bg">
        <div class="container">
            <div class="product_sidebar">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-12">
                        <!--sidebar widget start-->
                        <aside class="sidebar_widget">
                            <div class="widget_list widget_categories">
                                <h3>Filter By</h3>
                                <ul>
                                    <li class="widget_sub_categories"><a href="javascript:void(0)">Offers</a>
                                        <ul class="widget_dropdown_categories">
                                            <li><a href="#">Offer Code FOURTH (38)</a></li>
                      
                                            <li><a href="#">Clearance/Closeout (102)</a></li>
                                            <li><a href="#">Last Act (42)</a></li>
                                        </ul>
                                    </li>

                                    <li class=""><a href="">Size</a>
                                        <ul class="">
                                        <?php foreach($sizes as $size):?>

                                            <li><a href="#"><?=$size->name?></a></li>
                                            <?php endforeach;?>

                                        </ul>
                                    </li>

                                    <div class="product_variant color cat_color">
                                        <h4>color</h4>
                                        <ul>
                                        <?php foreach($colors as $color):?>
                                            <li style="background:<?=$color->code?>" ><a href="#" title="<?=$color->name?>"></a></li>
                                        <?php endforeach;?>
                                        </ul>
                            </div>
                            <!-- <div class="product_variant color cat_color">
                                        <h4>Color Family</h4><br>
                                        <div class="custom-control custom-checkbox">
                                     <div class="checkbox">
                                          <label><input type="checkbox" value=""> Multicolor</label>
                                        </div>
                                        <div class="checkbox">
                                          <label><input type="checkbox" value=""> Navy Blue</label>
                                        </div>
                                        <div class="checkbox disabled">
                                          <label><input type="checkbox"> Red</label>
                                        </div>
                                        <div class="checkbox disabled">
                                          <label><input type="checkbox"> Black</label>
                                        </div> 
                                        <div class="checkbox disabled">
                                          <label><input type="checkbox"> Blue</label>
                                        </div> 
                                        <div class="checkbox disabled">
                                          <label><input type="checkbox"> Maroon</label>
                                        </div> 
                                        <div class="checkbox disabled">
                                          <label><input type="checkbox"> Pink</label>
                                        </div> 
                                        <div class="checkbox disabled">
                                          <label><input type="checkbox"> White</label>
                                        </div> 

                                    </div>
                            </div> -->


                                    <li><a href="#">Brand</a>
                                        <br>
                                    <div class="custom-control custom-checkbox">
                                    <?php foreach($brands as $brand):?>
                                        <div class="checkbox">
                                          <label><input type="checkbox" value=""><?=$brand->name?></label>
                                        </div>
                                       
                                        <?php endforeach;?>

                                    </div>
                                    </li>
                                    
                                </ul>
                            </div>


                            <div class="widget_list widget_filter">
                                <h3>Filter by price</h3>
                                <form action="#">
                                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount">

                                </form>
                            </div>
                            <div class="widget_list widget_categories" style="font-weight: 600">
                                <ul>
                                    <li><a href="#">Customers' Top Rated </a></li>
                                    <li><a href="#">Discount Range </a></li>
                                    
                                </ul>
                            </div>
                        </aside>
                        <!--sidebar widget end-->
                    </div>
                    <div class="col-lg-9 col-md-12 col-12">
                        <div class="item-200">
                            <span style="color:red"><?=count($section->products)?></span> items in <span style="text-decoration: bold;color:red;font-size:.5em"><?=$section->name?></span>
                            <div style="font-size:.5em;margin-top: .5em;">Sort by 
                                <select class="aml-5" id="sortBy" title="sortBy">
                                                    <option value="ORIGINAL" selected="selected">Featured Items</option>
                                                    <option value="PRICE_LOW_TO_HIGH">Price: Low to High</option>
                                                    <option value="PRICE_HIGH_TO_LOW">Price: High to Low</option>
                                                    <option value="TOP_RATED">Customers' Top Rated</option>
                                                    <option value="BEST_SELLERS">Best Sellers</option>
                                                    <option value="NEW_ITEMS">New Arrivals</option>
                                </select>
                            </div> 

                            <div class="grid-list float-right">
                                <a href=""><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                  <a href=""><i class="fa fa-list" aria-hidden="true"></i>
</a>
                            </div>  
                        </div>
                        
                       <div class="row no-gutters shop_wrapper">
                  
                    <?php foreach($section->products as $product): ?>
                       <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="/singleProduct/<?=$product->id?>"><img src="<?=ASSETS?>/img/product/<?=$product->thumb1?>" alt=""></a>
                                        <a class="secondary_img" href="/singleProduct/<?=$product->id?>"><img src="<?=ASSETS?>/img/product/<?=$product->thumb2?>" alt=""></a>
                                        <div class="label_product_left label_product">
                                            <span class="label_sale_left">New</span>
                                        </div>
                                         <div class="label_product">
                                            <span class="label_sale"><?=$product->discount?>%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="10 colors | quick view" class="inner-search-back" class="inner-search-back"><i class="ion-ios-search-strong"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                     <div class="product_timing">
                                                <div data-countdown="<?=$product->discount_till?>"></div>
                                            </div>
                                        <div class="product_content_inner">
                                            <h2 class="product_name_brand_name">Club</h2>
                                            <h3 class="product_name"><a href="product-countdown.html">Men's Slim Fit Poplin Shart </a></h3>
                                            <h4 class="product_name_h4"><a href="">New ArriVal</a></h4>
                                            <div class="price_box">
                                                <span class="old_price">Reg. $<?=$product->price?></span><br />
                                                <span class="current_price">Sale $<?=(int)($product->price*(100-$product->discount)/100)?></span>
                                            </div>
                                            <div class="countdown_text mb-3">
                                               <!-- <a href="">Extra 15% off use:SUNDAY </a>-->
                                                <a href="" class="chng-color">Free shipping at $<?=$product->free_shipping?></a>
                                            </div>
                                           <div class="star_icon">
                                           <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>

                                           </div>
                                        </div>
                                       

                                    </div>
                                </figure>
                            </article> 
                        </div> 
                        <?php endforeach ?>
                        
                      

                         </div>


                         </div>
                    
                </div>
            </div>
        </div>
    </div>