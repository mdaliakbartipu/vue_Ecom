// Define a new component called button-counter

Vue.component('productblock', {
    props: ['listlink', 'listdata'],
    template: `
    <li>
        <a class="text-la" :href="listlink">listdata</a>
    </li>
    `
});




Vue.component('vuelist', {
    props: ['listlink', 'listdata'],
    template: `
    <li>
        <a class="text-la" :href="listlink">listdata</a>
    </li>
    `
});


Vue.component('addvertise', {
    props: ['image', 'slug'],
    template: `
    <figure class="single_banner">
        <div class="banner_thumb mb-2 para-one">
                <a :href="slug">
                    <img :src="image">
                </a>
        </div>
    </figure>
    `
});

Vue.component('slider-image', {
    props: ['imgleft', 'imgright', 'title', 'subtitle', 'slug', 'discount'],
    template: `
    <li class="slide">
    <div class="slide-partial slide-left"><img :src="imgleft"/></div>
    <div class="slide-partial slide-right"><img :src="imgright"></div>
    <h3 class="title1 title"><span class="title-text">{{title}}</span></h3><br>
    <h1 class="title"><span class="title-text">{{subtitle}}</span></h1>
    <p class="title3 title "><span class="title-text">discount <b style="color:red;">{{discount}}%</b> off this week </span></p>
    <a :href="slug" class="text-uppercase title4 wow flipInX"> discover Now </a>
</li>
    `
});

Vue.component('special', {
    props: ['iconclass', 'title', 'description'],
    template: `
    <div class="col-lg-3 col-md-6 col-12 ">
        <div class="col-shipping-box border">
        <div class="shipping_content pl-3 ppb-4 ppt-4">
        <i :class="iconclass" aria-hidden="true"></i>
            <h4 class="pt-1">{{title}}</h4>
            <p>{{description}}</p>
        </div>
        </div>
    </div>
    `
});

Vue.component('catproduct', {
    props: ['catname', 'styletext', 'catlink', 'subcatlist'],
    template: `
    <div class="single_categories_product" :style="styletext">
        <div class="categories_product_content text-center">
            <h4 class="text-center">{{catname}}</h4>
            <div class="hover_content">
                <ul class="mt-4 mb-4" >
                <slot></slot> 
                </ul>
            </div>
            <a :href="catlink" type="button" class="shopnow btn btn-primary" style="color:black">Shop Now</a>
        </div>
    </div>
    `
});


Vue.component('productthubslist', {

    props: ['thumbimages'],
    template: `
    <div class=" col-md-2 single-zoom-thumb">
       <ul class="s-tab-zoom" id="gallery_01">
                             
            <li v-for="thumb in thumbimages">
                <a href="#" class="elevatezoom-gallery">
                    <img v-bind:src="thumb" alt="zo-th-1">
                </a>
            </li>
        </ul>
    </div>
    `
});

Vue.component('productbigimage', {
    props: ['idtext', 'srclink', 'datazoom'],
    template: `
    <div id="img-1" class="col-md-10 zoomWrapper single-zoom">
        <a href="#">
            <img :id="idtext" :src="srclink"  :data-zoom-image="datazoom" alt="big-1">
        </a>
    </div>
    `
});

Vue.component('imagescolumn', {
    props: ['images'],
    template: `
    <div class="col-lg-6 col-md-6">
        <div class="product-details-tab">
            <div class="row">
            
                <productthubslist :thumbimages="images.thumb"></productthubslist>
            
                <productbigimage                              
                    idtext="zoom1" 
                    :srclink = "images.big"
                    :datazoom = "images.big"
                ></productbigimage> 
                
                <product_options></product_options>
                
            </div>
        </div>
    </div>
    `
});

Vue.component('product_options', {
    template: `
    <div class="product_options mt-5 ml-5">
        <span class="btn last-day2" style="width:30%"><i class="fa fa-puzzle-piece"></i> Embroidery &amp; Print</span>
        <span class="btn" style="width:15%"><i class="fa fa-play"></i> Video</span>
        <span class="btn" style="width:35%"><i class="fa fa-thumb-tack"></i> Article recommendation</span>
    </div>
    `
});


Vue.component('colors_variant', {
    template: `
    <div class="product_variant color">
    <ul>
        <li class="color1">
            <a href="#" data-toggle="tooltip" title="Black"></a>
        </li>
        <li class="color2">
            <a href="#" data-toggle="tooltip" title="Gray"></a>
        </li>
        <li class="color3">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
        <li class="color1">
            <a href="#"></a>
        </li>
        <li class="color2">
            <a href="#"></a>
        </li>
        <li class="color3">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
        <li class="color1">
            <a href="#"></a>
        </li>
        <li class="color2">
            <a href="#"></a>
        </li>
        <li class="color3">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
        <li class="color1">
            <a href="#"></a>
        </li>
        <li class="color2">
            <a href="#"></a>
        </li>
        <li class="color3">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
        <li class="color4">
            <a href="#"></a>
        </li>
    </ul>
    <p style="color:grey;font-weight:.5em">Color: BLACK
    </p>
</div>
    `
});


Vue.component('product_availability', {
    template: `
    <div class="product-availability">
        <i class="fa fa-wifi"></i> Availability: In Stock
    </div>
    `
});

Vue.component('product_extra_info', {
        template: `
    <div class="accordion product_accordian">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span style="float:left">Product Details</span> <i class="fa fa-plus pull-right"></i>
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span style="float:left">Price Details</span> <i class="fa fa-plus pull-right"></i>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="product_d_table">
                            <form action="#">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="first_child">Compositions</td>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Styles</td>
                                            <td>Girly</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Properties</td>
                                            <td>Short Dress</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span style="float:left">Shipping &amp; Returns</span> <i class="fa fa-plus pull-right"></i>
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
    `
    }),


    Vue.component('add_to_cart', {
        props: ['text'],
        template: `
    <button class="button add-to-cart" type="submit"><i class="fa fa-shopping-cart pull-left"></i>{{text}}</button>
    `
    }),


    Vue.component('product_quantity', {
        data: function() {
            return {
                count: 0,
                cartMessage: "Add To Cart"
            }
        },
        template: `
    <div class="product_variant quantity">
    <label>quantity</label>
    <input  name="quantity" type="text" :value="count"></input>
    <div id="qty_count" style="display:flex;flex-direction:column;margin-right:1em">
        <div @click="count++" class="plus fa fa-plus-circle"></div>
        <div @click="count--" class="minus fa fa-minus-circle"></div>
    </div>
    <add_to_cart :text="cartMessage"></add_to_cart>
</div>
    `
    });

Vue.component('product_name', {
    props: ['name'],
    template: `
    <h3><a href="#">{{name}}</a></h3>
    `
});

Vue.component('product_price', {
    props: ['price'],
    template: `
    <div class="price_box">
        <span class="current_price">{{price}} EUR <span style="font-weight:400">( <b>inc VAT</b> | ex VAT</span>)</span>
    </div>
    `
});


Vue.component('product_info', {
    data: function() {
        return {
            name: 'Nonstick Dishwasher PFOA',
            price: '10,59',
        }
    },
    template: `
    <div class="col-lg-6 col-md-6">
        <div class="product_d_right">
            <form action="">
                <product_name :name="name"></product_name>
                <product_price_notice></product_price_notice>
                <product_price :price="price"></product_price>
                <product_description 
                    description_line_one="from 5 items: 9,40"
                    description_line_two="from 30 items: 8,21"
                ></product_description>
                <colors_variant></colors_variant>
                <size_variant></size_variant>
                <br>
                <product_availability></product_availability>
                <br/>
                <product_quantity></product_quantity>
            </form>
        </div>
    </div>      
    `
});


Vue.component('product_details', {
    props: ['product'],
    template: `
    <div class="product_details">
        <div class="row">
            <imagescolumn :images="product.images"></imagescolumn>
            <product_info> </product_info>
        </div>
    </div>  
    `
});



Vue.component('product_price_notice', {
    template: `
    <div class="product_rating">
        <p style="font-size:.8em;">prices in VAT <u>plus shipping</u></p>
    </div>
    `
});

Vue.component('product_description', {
    props: ['description_line_one', 'description_line_two'],
    template: `
    <div class="product_desc">
       <p style="font-weight:200"><i>{{description_line_one}}<br>{{description_line_two}}  </i></p>
    </div>
    `
});

Vue.component('size_variant', {
    template: `
    <div class="product_size">
    <p style="float:right">SizeTable</p><br>
    <hr style="">
    <ul id="product_size">
        <li class="selected">
            <a href="#" data-toggle="tooltip" title="XS">XS</a>
        </li>
        <li>
            <a href="#">S</a>
        </li>
        <li>
            <a href="#">M</a>
        </li>
        <li>
            <a href="#">L</a>
        </li>
        <li>
            <a href="#">XL</a>
        </li>
        <li>
            <a href="#">2XL</a>
        </li>
    </ul>
    <p style="color:grey;font-weight:.5em">Size: XS
    </p>
</div>
    `
});


Vue.component('product_article', {
    data: function() {
        return {
            link: "/singleProduct/1" + this.id,
        }
    },
    props: ['thumb1', 'thumb2', 'name', 'price', 'id'],
    template: `
    <article class="single_product">
        <figure>
            <div class="product_thumb">
                <a class="primary_img" :href="link"><img :src="thumb1" alt=""></a>
                <a class="secondary_img" :href="link"><img :src="thumb2" alt=""></a>
                <div class="label_product_left label_product">
                    <span class="label_sale_left">New</span>
                </div>
                    <div class="label_product">
                    <span class="label_sale">29%</span>
                </div>
                <div class="action_links">
                    <ul>
                        <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                        <li class="compare"><a href="#" title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>
                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="10 colors | quick view"><i class="ion-ios-search-strong"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="product_content">
                <div class="product_timing">
                        <div data-countdown="2020/02/16"></div>
                    </div>
                <div class="product_content_inner">
                    <h2 class="product_name_brand_name">{{name}}</h2>
                    <h3 class="product_name"><a href="product-countdown.html">{{name}}</a></h3>
                    <h4 class="product_name_h4"><a href="">New ArriVal</a></h4>
                    <div class="price_box">
                        <span class="old_price">Reg. $49</span><br />
                        <span class="current_price">Sale {{price}}</span>
                    </div>
                    <div class="countdown_text mb-3">
                        <!-- <a href="">Extra 15% off use:SUNDAY </a>-->
                        <a href="" class="chng-color">Free shipping at $45</a>
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
    `
});




Vue.component('tab_products', {

    template: `
    <div class="tab-pane fade show active" id="Fashion" role="tabpanel">
        <div class="product_carousel product_style product_column5 owl-carousel">

           <slot></slot>
                            
        </div>
    </div>
    `
});






new Vue({
    el: "#app",
    data: {
        qty: 1,
        product: {
            qty: 5,

            images: {
                big: "/front/assets/img/product/productbig5.jpg",
                thumb: {
                    img1: "/front/assets/img/product/productbig1.jpg",
                    img2: "/front/assets/img/product/productbig2.jpg",
                    img3: "/front/assets/img/product/productbig3.jpg",
                    img4: "/front/assets/img/product/productbig4.jpg",
                    img5: "/front/assets/img/product/productbig5.jpg"
                }
            },
        }
    },

    methods: {
        increase() {
            this.qty = this.qty + 1;
        },
        decrease() {
            if (this.qty > 0) {
                this.qty = this.qty - 1;
            }

        },
        selectImage(index) {
            this.product.images["img-normal"] = this.product.images.thumb[index];
        }
    }

})