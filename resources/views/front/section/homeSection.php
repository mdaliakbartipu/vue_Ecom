<div class="clearfix"></div>
<div>
</div>


<div class="home_section_bg">
        <div class="product_area deals_product">
            <div class="container">
            <div class="para-six">
                <div class="row">
                    <div class="col-12 col-md-9 offset-md-3">
                        <div class="product_header">
                            <div class="product_tab_btn text-center">
							<h3 class="mb-2">YOUR COLLECTION</h3>
                             <p class="text-center time-to">Trending Fashion</p>
                                <ul class="nav text-center" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#new" role="tab" aria-controls="Fashion" aria-selected="true">
                                           New Arrivals
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#deals" role="tab" aria-controls="Games" aria-selected="false">
                                        Deals Of The Month
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#featured" role="tab" aria-controls="Speaker" aria-selected="false">
                                           Featured Products
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#best" role="tab" aria-controls="Mobile" aria-selected="false">
                                           
										Best Selling Products
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Fashion" role="tabpanel">
                        <div class="product_carousel product_style product_column5 owl-carousel">
                        <?php 
                        foreach($products as $product): ?>
                        <product_article 
                            thumb1="/front/assets/img/product/thumb1.jpg"
                            thumb2="/front/assets/img/product/thumb2.jpg"
                            name="<?=$product->name?>"
                            price="<?=$product->price?>"
                            id="<?=$product->id?>"
                        ></product_article>
                        <?php endforeach; ?>                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="deals" role="tabpane2">
                        <div class="product_carousel product_style product_column5 owl-carousel">
                        
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="best" role="tabpane3">
                        <div class="product_carousel product_style product_column5 owl-carousel">
                        
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="featured" role="tabpane3">
                        <div class="product_carousel product_style product_column5 owl-carousel">
                        
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>

                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>

                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                            <product_article 
                                thumb1="/front/assets/img/product/thumb1.jpg"
                                thumb2="/front/assets/img/product/thumb2.jpg"
                            ></product_article>
                        </div>
                    </div>
                </div>

</div>
            </div>
        </div>
        <!--product area end-->

        <!--banner area start-->


    </div>
   