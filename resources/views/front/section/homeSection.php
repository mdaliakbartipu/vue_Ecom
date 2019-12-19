<div class="clearfix"></div>


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
                                 
                                    <li v-for="(tab,index) in tabs">
                                        <a @click.prevent="updateTabProducts(tab)"  :class="{ 'active': index === 0 }" data-toggle="tab" :href="'#'+tab.id" role="tab" aria-controls="tab.id" aria-selected="{ 'true': index === 0 }">
                                            {{tab.name}}
                                        </a>
                                    </li>
                                

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tabcontent">
                            <tab_products :tab="this.selected.tab">
                            </tab_products>           
                </div>
            
            <!-- tab content end here -->

        </div>
    </div>
</div>
<!--product area end-->

<!--banner area start-->


</div>