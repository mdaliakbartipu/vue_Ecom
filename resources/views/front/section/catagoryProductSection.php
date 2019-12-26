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
                                        <?php foreach ($sizes as $size) : ?>

                                            <li><a href="#"><?= $size->name ?></a></li>
                                        <?php endforeach; ?>

                                    </ul>
                                </li>

                                <div class="product_variant color cat_color">
                                    <h4>color</h4>
                                    <ul>
                                        <?php foreach ($colors as $color) : ?>
                                            <li style="background:<?= $color->code ?>"><a href="#" title="<?= $color->name ?>"></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <li><a href="#">Brand</a>
                                    <br>
                                    <div class="custom-control custom-checkbox">
                                        <?php foreach ($brands as $brand) : ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value=""><?= $brand->name ?></label>
                                            </div>

                                        <?php endforeach; ?>

                                    </div>
                                </li>

                            </ul>
                        </div>


                        <div class="widget_list widget_filter">
                            <h3>Filter by price</h3>
                            <form action="#">
                                <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
                                </div>
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

                <category-page
                    type="cat"
                    slug="<?=$section->slug?>"
                ></category-page>

            </div>
        </div>
    </div>
</div>