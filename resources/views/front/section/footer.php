

<footer class="footer_widgets">
    <!--newsletter area start-->
   
    <!--newsletter area end-->
    <div class="footer_top">
        <div class="container">
            <div class="row">

<?php foreach($tags as $tag): ?>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3><?=$tag->name?></h3>
                        <div class="footer_menu">
                            <ul>
                                <?php foreach($pages as $page): ?>
                                    <?php if($tag->id != $page->tag)  continue;  ?>
                                <li><a href="/pages/<?=$page->slug?>"><?=$page->name?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
<?php endforeach; ?>


                <div class="col-lg-3">
                    <div class="widgets_container footer-sign-up">
                        <h3>GET $10 Off</h3>
                        <p>Sign up for Sales & Exclusive offers! Don’t miss out!</p>
                        <div class="footer_contact">
                            <form action="#">

                                <div class="search_box show footer-search-box">
                                    <input placeholder="Enter your email address.." type="text">
                                    <button type="submit"><i class="fa fa-caret-right" aria-hidden="true"></i>
</button>
                                </div>
                            </form>


                        </div>

                        <div class="footer_social pull-left">
                            <ul>
                                <li><img src="<?=ASSETS?>/img/payments/payment-master.png" alt="" class="payments-img" /></li>
                                <li><img src="<?=ASSETS?>/img/payments/payment-paypal.png" alt="" class="payments-img" /></li>

                                <li><img src="<?=ASSETS?>/img/payments/payment-skrill.png" alt="" class="payments-img" /></li>
                                <li><img src="<?=ASSETS?>/img/payments/payment-paypal.png" alt="" class="payments-img" /></li>
                            </ul>
                        </div>
                    </div>
                </div>




                

                <div class="col-lg-3 col-md-7 col-sm-12">
                    <instagram></instagram>
                </div>
            </div>
            <div class="footer_social">
                <h5>Follow Us </h5>
                    <ul>
                        <li><a class="facebook"    target="_blank"  href="<?=$company->facebook??'#'?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter"    target="_blank"  href="<?=$company->twitter??'#'?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="instagram"    target="_blank"  href="<?=$company->instagram??'#'?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="linkedin"    target="_blank"  href="<?=$company->linkedin??'#'?>"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
            </div>
            <div class="footer-note col-lg-12 text-center mt-5" style="color:grey;
    font-size: 13px;">
            <a href="/pages/privacy-notice">Privacy Notice</a> | <a href="/pages/ca-privacy-rights">CA Privacy Rights</a> | <a href="/pages/legal-notice">Legal Notice</a> | <a href="/pages/customer-bill-of-rights">Customer Bill of Rights</a> | <a href="/pages/ca-transparency-in-supply-chains">CA Transparency in Supply Chains</a> | <a href="/pages/product-recalls">Product Recalls</a> | <a href="/pages/pricing-policy">Pricing Policy</a> | <a href="/pages/sitemap">Site Map</a>
            <p class="copyright">Copyright &copy; 2019 <a href="#"><?=$company->name??"DemoCompany"?></a> All Right Reserved</p>
            <p class="developed-by">Develop by <strong>Smart Software Ltd.</strong></p>
            </div>

        </div>
    </div>
   
</footer>

                                </div> 
                                <!-- Vue end -->
