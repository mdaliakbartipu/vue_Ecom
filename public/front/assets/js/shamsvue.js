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
    template: `
    <div class="col-lg-6 col-md-6">
        <div class="product-details-tab">
            <div class="row">
                <slot></slot>
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

Vue.component('add_to_cart', {
        template: `
    <button class="button add-to-cart" type="submit"><i class="fa fa-shopping-cart pull-left"></i> add to cart</button>
    `
    }),


    Vue.component('product_quantity', {
        data: function() {
            return {
                count: 0
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
    <slot></slot>
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
    template: `
    <div class="col-lg-6 col-md-6">
        <div class="product_d_right">
            <form action="">
                <slot></slot>
            </form>
        </div>
    </div>      
    `
});


Vue.component('product_details', {
    template: `
    <div class="product_details">
        <div class="row">
            <slot></slot>
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


new Vue({
    el: "#app",
    data: {
        qty: 1,
        product: {
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

});