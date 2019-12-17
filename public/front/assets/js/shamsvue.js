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
        <a :href="slug" class="text-uppercase title4 wow flipInX"> discover Now</a>
    </li>
    `
});

// cartstart


Vue.component('cart_table', {

    data: function() {
        return {
            products: [{
                    image: '/front/assets/img/s-product/product.jpg',
                    name: "Test product",
                    price: "100",
                    qty: {
                        min: 1,
                        max: 10,
                        selected: 3
                    },
                    total: 300
                },
                {
                    image: '/front/assets/img/s-product/product.jpg',
                    name: "Test product",
                    price: "100",
                    qty: {
                        min: 1,
                        max: 10,
                        selected: 3
                    },
                    total: 300,
                },
            ]

        }
    },
    template: `
    <div class="row">
    <div class="col-12">
        <div class="table_desc">
            <div class="cart_page table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="product_remove">Delete</th>
                            <th class="product_thumb">Image</th>
                            <th class="product_name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product_quantity">Quantity</th>
                            <th class="product_total">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="product in products">
                            <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                            <td class="product_thumb"><a href="#"><img :src="product.image" ></a></td>
                            <td class="product_name"><a href="#">{{product.name}}</a></td>
                            <td class="product-price">£{{product.price}}</td>
                            <td class="product_quantity"><label>Quantity</label> <input :min="product.qty.min" :max="product.qty.max" :value="product.qty.selected" type="number"></td>
                            <td class="product_total">£{{product.total}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="cart_submit">
                <button type="submit">update cart</button>
            </div>
        </div>
    </div>
</div>
    `
})

Vue.component('coupon', {

    template: `
    <div class="coupon_code left">
            <h3>Coupon</h3>
            <div class="coupon_inner">
                <p>Enter your coupon code if you have one.</p>
                <input placeholder="Coupon code" type="text">
                <button type="submit">Apply coupon</button>
            </div>
    </div>
    `
});


Vue.component('cart_total', {

    data: function() {
        return {
            message: "",
        }
    },
    template: `
    <div class="coupon_code right">
            <h3>Cart Totals</h3>
            <div class="coupon_inner">
                    <div class="cart_subtotal">
                        <p>Subtotal</p>
                        <p class="cart_amount">£215.00</p>
                    </div>
                    <div class="cart_subtotal ">
                        <p>Shipping</p>
                        <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                    </div>
                    <a href="#">Calculate shipping</a>

                    <div class="cart_subtotal">
                        <p>Total</p>
                        <p class="cart_amount">£215.00</p>
                    </div>
                    <div class="checkout_btn">
                        <a href="/checkout">Proceed to Checkout</a>
                    </div>
            </div>
        </div>
    `
})


Vue.component('cart', {
    template: `
    <div class="cart_page_bg">
    <div class="container">
        <div class="shopping_cart_area">
            <form action="#">
                <cart_table></cart_table>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <coupon></coupon>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <cart_total></cart_total>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
</div>
    `
});




// cartstop









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
    props: ['colors'],
    methods: {
        selected: function(index) {
            this.$emit('color-selected', index);
        }
    },
    template: `
    <div class="product_variant color">
    <ul>
        <li v-for="(color,index) in colors"  :key="index" class="color1">
            <button data-toggle="tooltip" :title="color.name" @click="selected(index)">
            <img width="20px" :src="color.image">
            </button>
        </li>
    </ul>
    <p style="color:red;font-weight:.5em">Color: Black
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
    props:['details'],
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
                    <div v-html="details" class="card-body">
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
    props:['product'],
    data: function() {
        return {
            selected: {
                color: null,
                size: null,
                qty: null

            },
            name: 'Nonstick Dishwasher PFOA',
            price: '10,59',
            colors: [{
                    id: 1,
                    image: "/front/assets/img/color/color.png",
                    code: "#FFFF",
                    name: "Black"
                },
                {
                    id: 1,
                    image: "/front/assets/img/color/color.png",
                    code: "#FFFF",
                    name: "Black"
                },
                {
                    id: 1,
                    image: "/front/assets/img/color/color.png",
                    code: "#FFFF",
                    name: "Black"
                }
            ],
        }
    },
    methods: {
        setColor: function(id) {
            console.log("Color selected in child id:" + id);
            this.selected.color = "selected";
        }
    },
    mounted () {
        console.log(this.product);
      },
    template: `
    <div class="col-lg-6 col-md-6">
        <div class="product_d_right">
            <form action="">
                <product_name :name="product.name"></product_name>
                <product_price_notice></product_price_notice>
                <product_price :price="product.price"></product_price>
                <product_description 
                    description_line_one="from 5 items: 9,40"
                    description_line_two="from 30 items: 8,21"
                ></product_description>
                <colors_variant :colors="colors" @color-selected="setColor"></colors_variant>
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
    props: ['images', 'product'],
    template: `
    <div class="product_details">
        <div class="row">
            <imagescolumn :images="images"></imagescolumn>
            <product_info :product="product"> </product_info>
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
    props: ['thumb1', 'thumb2'],
    template: `
    <div class="">
    <article class="single_product">
    <figure>
        <div class="product_thumb">
            <a class="primary_img" href="#"><img :src="thumb1" alt=""></a>
            <a class="secondary_img" href="#"><img :src="thumb2" alt=""></a>
            <div class="label_product_left label_product">
                <span class="label_sale_left">New</span>
            </div>
             <div class="label_product">
                <span class="label_sale">29%</span>
            </div>
            <div class="action_links">
                <ul>
                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                    <li class="compare"><a href="#" title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>
                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="10 colors | quick view" class="inner-search-back"><i class="ion-ios-search-strong"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="product_content">
         <div class="product_timing">
                    <div data-countdown="2020/02/16"></div>
                </div>
            <div class="product_content_inner">
                <h2 class="product_name_brand_name">Club</h2>
                <h3 class="product_name"><a href="product-countdown.html">Men's Slim Fit Poplin Shart </a></h3>
                <h4 class="product_name_h4"><a href="">New ArriVal</a></h4>
                <div class="price_box">
                    <span class="old_price">Reg. $49</span><br />
                    <span class="current_price">Sale $35</span>
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
    </div>
    `
});




Vue.component('tab_products', {
    data: function() {
        return {
            products: {
                images: {
                    thumb1: "/front/assets/img/product/thumb1.jpg",
                    thumb2: "/front/assets/img/product/thumb2.jpg",
                    all: ""
                }
            },
            count: 10,
        }
    },
    props: ['tab_id'],
    template: `
    <div class="tab-pane fade show" :id="tab_id" role="tabpanel">
        <section class="customer-logos">
                <product_article v-for="c in count" v-bind:key="c.text"
                    :thumb1="products.images.thumb1"
                    :thumb2="products.images.thumb2"
                ></product_article>    
           </section>   
        </div>
    `
});




Vue.component('related_products', {
    data: function() {
        return {
            products: {
                images: {
                    thumb1: "/front/assets/img/product/thumb1.jpg",
                    thumb2: "/front/assets/img/product/thumb2.jpg",
                    all: ""
                }
            },
            count: 10,
        }
    },
    props: ['tab_id'],
    template: `
    <section class="product_area related_products">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>SIMILAR ITEMS :YOU MAY ALSO LIKE</h2>
                    </div>
                </div>
            </div>

            <section class="customer-logos">
                    <product_article v-for="c in count" v-bind:key="c.text"
                        :thumb1="products.images.thumb1"
                        :thumb2="products.images.thumb2"
                    ></product_article>    
            </section> 

    </section>
    `
});

Vue.component('single_product_section', {
    data: function(){
        return {
            product:null,
        }
    },
    props: ['images'],
    mounted () {
        axios
          .get('http://127.0.0.1:8000/get_product/23')
          .then(response => (this.product = response.data
            ));
      },
    template: `
    <div>
        <product_details v-if="product" :product="product" :images="images"></product_details>
        <product_extra_info v-if="product" :details="product.details"></product_extra_info>
    </div>
    `
});



Vue.component('top_nav_bar', {

    template: `
    <nav>
        <ul>
            <li><a href="/">home</a>
                <ul class="sub_menu">
                    <li><a href="/catagory_products">Catagory Page</a></li>
                    <li><a href="/singleProduct/1">Product Single Page</a></li>
                </ul>
            </li>
            <li class="mega_items"><a href="#">shop</a>
            </li>
            <li><a href="/blog">blog</a>
            </li>
            <li><a class="#" href="#">pages</a>
            </li>

            <li><a href="/pages/about-us">About Us</a></li>
            <li><a href="/contact"> Contact Us</a></li>
        </ul>
    </nav>
    `
});


Vue.component('company_logo', {
    props: ['logo'],
    template: `
    <div class="logo">
            <a href="/"><img :src="logo" alt="" style="max-width:120%;"></a>
    </div>
    `
});


Vue.component('top_bar_menu_item', {
    props: ['cat'],
    template: `<li class="top_bar_menu_item" style="width:150px">
                    <a href="/category_products/<?=$cat->id?>" class="dropbtn">
                            {{cat}}
                            <!--  <i class="fa fa-caret-down"></i> -->
                    </a>
            </li>
    `
});


Vue.component('all_categories', {

    props: ['cats'],
    template: `
    <div class="hover_category">
            <select class="select_option" name="select" id="categori2">
                <option selected value="1">All Categories</option>
               <slot> </slot>
                </select>
    </div>
    `
});

Vue.component('category_list', {
    props: ['cat_id', 'cat_name'],
    template: `
            <option :value="cat_id">{{cat_name}}</option>
    `
});

Vue.component('top_search_box', {
    template: `
    <div class="search_box show last-day-7">
            <input placeholder="Search or enter web ID" type="text">
            <a href=""><button type="submit"><i class="fa fa-search"></i></button></a>
    </div>
    `
});

Vue.component('header_top', {

    computed: {
        // a computed getter
        user: function() {
            if (this.hasUser) {
                return true;
            } else {
                return false;
            }
        }
    },

    method: {
        logout: function() {
            event.preventDefault();
            document.getElementById('logout-form-top').submit();
        }
    },

    data: function() {
        return {
            hasUser: this.user_id,
            userName: this.user_name,
        }
    },

    props: ['user_name', "user_id", 'token'],

    template: `
    <div class="header_top">
                <div class="row ">
                    <div class="col-lg-6 col-md-6">
                        <div class="antomi_message ">
                            <ul style="display:flex">
                                <li class="hot">Special Offer!</li>
                                <li class="hot">Black Friday</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header_top_settings text-right">
                            <ul>
                                <li v-if="!user">
                                    <a  href="/login"><i class="fa fa-user" style="color:#008F95;border-left:unset" ></i> Login</a>
                                </li>
                                <li v-if="!user">
                                    <a  href="/register"><i class="fa fa-user" style="color:#008F95" ></i> Register</a>
                                </li>
                                <li v-if="user">
                                    <a  href="/dashboard"><i class="fa fa-user" style="color:#008F95" ></i> My Account</a>
                                </li>
                                <li v-if="user">
                                <a href="/logout"><i class="fa fa-user" style="color:#008F95" ></i> Logout</a>
                                <li>USD</li>
                                <li><i class="fas fa-flag-usa" aria-hidden="true"></i>English</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            `
});



Vue.component('shop_by_categories', {
    template: `
    <div class="column1 col-lg-3 col-md-6  col-12 col-sm-d-none">
        <div class="categories_menu categories_three">
            <div class="categories_title">
                <h2 class="">SHOP BY CATEGORY</h2>
            </div>
            <div class="categories_menu_toggle">
                <ul>
                    <slot></slot>
                <li id="cat_toggle" class="has-sub"><a href="#"><i class="fa fa-caret-square-o-down mr-10" aria-hidden="true"></i>
                More Categories</a>
            <ul class="categorie_sub">
                <li><a href="#">Hide Categories</a></li>
            </ul>
        </li>

    </ul>
</div>
</div>
</div>
    `
});

Vue.component('super_section_list', {
    props: ['link', 'name'],
    template: `
    <li><a href="link">{{name}}</a></li>
`
});

Vue.component('sub_section_list', {
    props: ['link', 'name'],
    template: `
    <li class="menu_item_children">
            <a :href="link">{{name}}</a>
            <ul class="categorie_sub_menu">
            <slot></slot>
            </ul>
    </li>
    `
});


Vue.component('cat_section_list', {
    date: function() {
        return {
            catClassWithIcon: this.icon + " mr-10",
            link: "/catagory_products/" + this.id,
        }
    },
    props: ['icon', 'id', 'name'],
    template: `
    <li class="menu_item_children"><a :href="this.link">
            <i :class="this.catClassWithIcon" aria-hidden="true"></i>
                {{name}} <i class="fa fa-angle-right"></i></a>
            <ul class="categories_mega_menu">
                    <slot></slot>
            </ul>
    </li>
    `
});

// shop_by_categories



Vue.component('singin_and_cart', {
    props: ['cart_image'],
    template: `
    <div class="column3 col-lg-3 col-md-6 hide col-sm-12 col-sm-d-none">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-sm-d-none">
                    <div class="header_bigsale ">
                        <p>Hi, Sign in </p>
                        <div class="categories_menu categories_three">
                            <div class="categories_market_second">
                                <p class="categori_toggle font-weight-bold ">My Market</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <miniCart></miniCart>
                </div>
            </div>
        </div>
    `
});


Vue.component('miniCart', {

    data: function() {
        return {
            products: [{
                    name: "something",
                    image: "/front/assets/img/s-product/product.jpg",
                    qty: 5,
                    price: 100,
                },
                {
                    name: "something",
                    image: "/front/assets/img/s-product/product.jpg",
                    qty: 1,
                    price: 200,
                }
            ]
        }
    },

    computed: {
        // a computed getter
        total: function() {
            // counting total
            let count = 0;
            let t = 0;
            for (count; count < this.products.length; count++) {
                t += this.products[count].qty * this.products[count].price;
            }
            return t;
        }
    },

    template: `
    <div class="header_configure_area">
            <div class="header_wishlist">
                <a href="#">
                    <span class="wishlist_count" style="padding-bottom:4em;padding-left:4em;">3</span>
                </a>
            </div>
            <div class="mini_cart_wrapper">
                <a href="javascript:void(0)">
                        <div class="cart_img_page ">
                        <a href=""><img src="/front/assets/img/logo/cart.png" alt="" /></a>
                        </div>
                </a>
                <!--mini cart-->
                <div class="mini_cart">
                    <div class="mini_cart_inner">
                        
                    
                        <div class="cart_item" v-for="product in this.products">
                            <div class="cart_img">
                                <a href="#"><img :src="product.image" alt=""></a>
                            </div>
                            <div class="cart_info">
                                <a href="#">Sit voluptatem rhoncus sem lectus</a>
                                <p>Qty: {{ product.qty}} X <span> $ {{product.price}} </span></p>
                            </div>
                            <div class="cart_remove">
                                <a href="#"><i class="ion-android-close"></i></a>
                            </div>
                        </div>
          



                        <div class="mini_cart_table">
                            <div class="cart_total">
                                <span>Sub total:</span>
                                <span class="price">$ {{total}}</span>
                            </div>
                            <div class="cart_total mt-10">
                                <span>total:</span>
                                <span class="price">$ {{total}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mini_cart_footer">
                        <div class="cart_button">
                            <a href="/cart">View cart</a>
                        </div>
                        <div class="cart_button">
                            <a href="/checkout">Checkout</a>
                        </div>

                    </div>
                </div>
                <!--mini cart end-->
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