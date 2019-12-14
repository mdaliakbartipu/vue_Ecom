<header>
    <div class="main_header header_padding">
        <div class="container">
            <!--header top start-->
            <header_top></header_top>



            <!--header top start-->
            <?php
            $img = null;

            if (file_exists(ASSETS . "/.uploads/company/" . $company->logo)) {
                $img = ASSETS . "/.uploads/company/" . $company->logo;
            } else {
                $img = ASSETS . "/img/company/" . $company->logo;
            }
            ?>


            <!--header middel start-->
            <div class="header_middle">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-6 col-xs-12">



                        <company_logo logo="<?= $img ?>"></company_logo>

                    </div>
                    <div class="col-lg-8 col-md-12 col-xs-12 text-center ">
                        <div class="main_menu menu_position text-center">
                            <top_nav_bar></top_nav_bar>
                        </div>
                    </div>

                    <div class="col-lg-2 col-xs-12">
                        <div class="header_configure_area">
                            <div class="header_wishlist text-right">
                                <a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    <span class="wishlist_count">0</span>
                                </a>
                            </div>
                            <div class="header_wishlist">
                                <a href="#"><i class="fa fa-heart text-right" aria-hidden="true"></i>

                                    <span class="wishlist_count">0</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--header middel end-->
            <!--header middel end-->

            <div class="header_middle sticky-header second d-none sticky">
                <nav class="top-bar animate-dropdown fixed-icon" style="padding-top: 5px;">
                    <div class="container magicmenu clearfix ">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-lg-5 col-md-5 no-margin hidden-xs">
                                <div class="row clearfix">

                                    <div class="col-md-2 col-sm-4 col-lg-2 offset-1 sticky_menu_section">
                                        <nav class="pro_hide">

                                            <ul class="navbar-nav mr-auto">
                                                <li class="dropdown col-md-4 col-sm-4 col-lg-4 hidden-xs ">
                                                    <a href="#" class="top-cat-option ml-5" style="font-size: 15px; font-weight: 400; margin-top: -11px;"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                                    <ul id="top_bar_menu" style="width:150px">
                                                        <?php foreach ($cats as $cat) { ?>
                                                            <top_bar_menu_item cat_id="<?= $cat->id ?>"></top_bar_menu_item>
                                                        <?php } ?>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-lg-8 col-xs-12 search-top ">
                                        <form action="" class="input-icons ml-3">

                                            <input class="input-field header-search top-search" type="text" name="search" placeholder="Search">
                                            <i class="btn fa fa-search icon"></i>
                                        </form>
                                    </div>


                                </div>
                            </div><!-- /.col -->

                            <div class="hidden-xs hidden-sm col-md-2 col-lg-2 text-center col-sm-d-none
                                last-13">

                                <img class="header-fixed-logo" src="<?= ASSETS ?>/img/logo/companyIcon.png" style=" margin-top:3px; width:53px;">

                            </div>

                            <div class="hidden-xs hidden-xs hidden-sm col-md-5 col-lg-4 col-sm-d-none">
                                <ul class="right">

                                    <li>
                                        <span href="#change-language" click="something()" style="color:#969696; margin-right: 3px;">de</span> |
                                        <span href="#change-language" style="margin-right: 3px;">en</span> |
                                        <span href="#change-language" style="color:#969696;">fr</span>
                                    </li>

                                    <li style="padding-left: 5px">
                                    </li>

                                    <li class="dropdown">
                                        <a href="ProductCategory.php" class="top-order-icon"><i class="fa fa-file-text-o"></i></a>

                                        <div class="top-order-drop drop">
                                            <div class="title">
                                                <i class="fa fa-file-text-o"></i>
                                                <span> Quick Order</span>
                                            </div>
                                            <div>
                                                <div class="inputItems">
                                                    <input type="text" name="qt" placeholder="Quantity">
                                                    <input type="text" name="catalogue" placeholder="Catalogue no.">
                                                </div>
                                                <div class="inputSubmit">
                                                    <input type="button" class='btn btn-info' value="Add to order form">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="dropdown">
                                        <a href="ProductCategory.php" class="top-user-icon"><i class="fa fa-user-o"></i></a>
                                        <div class="top-user-drop drop">
                                            <div class="title">
                                                <i class="fa fa-lock"></i>
                                                <span> Login</span>
                                            </div>
                                            <div>
                                                <div class="userFlexItem">
                                                    <input type="text" name="qt" placeholder="username">
                                                    <input type="text" name="catalogue" placeholder="password">
                                                </div>
                                                <div class="inputSubmit">
                                                    <input type="button" class='btn btn-info' value="login">
                                                </div>
                                                <div class="bottom">
                                                    <a href="#">First-time registration </a><br>
                                                    <a href="#">Forgotten your password </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="dropdown">
                                        <a href="ProductCategory.php" class="top-cart-icon" data-hover="dropdown" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-shopping-cart"></i></a>
                                        <div class="top-cart-drop drop">
                                            <div class="title">
                                                <i class="fa fa-shopping-basket"></i>
                                                <span> Basket</span>
                                                <p style="padding-left:2em">( no products selected )</p>
                                            </div>
                                            <div>
                                                <div class="sTitle">
                                                    <i class="fa fa-undo"></i>
                                                    <span> free 30-day right to return</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="dropdown">
                                        <a href="ProductCategory.php" class="top-items-icon"><i class="fa fa-exclamation-circle"></i></a>
                                        <div class="top-items-drop drop">
                                            <div><i class="fa fa-phone-square"></i> Callback</div>
                                            <div><i class="fa fa-envelope"></i> Contact</div>
                                            <div><i class="fa fa-rss-square"></i> Newsletter</div>
                                            <div><i class="fa fa-globe"></i> Company</div>
                                            <div><i class="fa fa-briefcase"></i> Career</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.container -->
                </nav><!-- /.top-bar -->

            </div>


            <!-- This should be added to vuejs -->

            <!--header bottom satrt-->
            <div class="header_bottom">
                <div class="row align-items-center">
                    <shop_by_categories>
                        <?php foreach ($cats as $cat) :  ?>
                            <li class="menu_item_children"><a href="/catagory_products/<?= $cat->id ?>">
                                    <i class="<?= $cat->icon ?> mr-10" aria-hidden="true"></i>
                                    <?= $cat->name ?> <i class="fa fa-angle-right"></i></a>
                                <ul class="categories_mega_menu">
                                    <?php foreach ($subCats[$cat->id] as $sub) : ?>
                                        
                                                <?php foreach ($subSubCats[$sub->id] as $subsub) : ?>
                                                    <cat_section_list
                                                        link="/subsubcat_products/<?= $subsub->id ?>"
                                                        name="<?= $subsub->name ?>"
                                                    ></cat_section_list>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </shop_by_categories>


                    <!-- shop by cat end -->
                    <div class="column2 col-lg-6 col-sm-12">
                        <div class="search_container">
                            <form action="#">
                                <!-- Should be added to vue -->
                                <all_categories>
                                    <?php foreach ($cats as $cat) : ?>
                                        <category_list cat_id="<?= $cat->id ?>" cat_name="<?= $cat->name ?>"></category_list>
                                    <?php endforeach; ?>
                                </all_categories>
                                <top_search_box></top_search_box>
                            </form>
                        </div>

                    </div>

                    <singin_and_cart cart_image="<?= ASSETS ?>/img/logo/cart.png"></singin_and_cart>


                </div>
            </div>


        </div>
    </div>
</header>