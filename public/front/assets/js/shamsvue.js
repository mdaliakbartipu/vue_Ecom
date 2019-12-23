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
                    <img loading="lazy" :src="image">
                </a>
        </div>
    </figure>
    `
});

Vue.component('slider-image', {
    props: ['imgleft', 'imgright', 'title', 'subtitle', 'slug', 'discount'],
    template: `
    <li class="slide">
        <div class="slide-partial slide-left"><img loading="lazy" :src="imgleft"/></div>
        <div class="slide-partial slide-right"><img loading="lazy" :src="imgright"></div>
        <h3 class="title1 title"><span class="title-text">{{title}}</span></h3><br>
        <h1 class="title"><span class="title-text">{{subtitle}}</span></h1>
        <p class="title3 title "><span class="title-text">discount <b style="color:red;">{{discount}}%</b> off this week </span></p>
        <a :href="slug" class="text-uppercase title4 wow flipInX"> discover Now</a>
    </li>
    `
});

// cartstart


Vue.component('cart_table', {

    data: function () {
        return {
            product: [{
                image: '/front/assets/.uploads/s-product/this.product.jpg',
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
                image: '/front/assets/img/s-product/this.product.jpg',
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
    props:['items'],
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
                            <th class="product_color">Color</th>
                            <th class="product_size">Size</th>
                            <th class="product-price">Price</th>
                            <th class="product_quantity">Quantity</th>
                            <th class="product_total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                            <slot></slot>
                    </tbody>
                </table>
            </div>
            <div class="cart_submit">
                <a href="/cart" class="btn btn-sm btn-info">update cart</a>
            </div>
        </div>
    </div>
</div>
    `
})

Vue.component('cart_row', {
    data: function(){
        return {
            active:true,
            product:{
                name:this.name,
                price:this.price,
                size:this.size,
                color:this.color,
                variantID:this.variant_id,
                qty:this.qty,
                image:this.image,
                total:100
            },
            path:"/front/assets/.uploads/products/thumbs/"
        }
    },
    props:['name','price','size','color','variant_id', 'qty','image'],
    methods:{
        remove: function(variant){
    
            swal({
                title: "Are you sure?",
                
                icon: "info",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal("Okey! Your cart item has been deleted!", {
                    icon: "success",
                  });
                  axios
            .get('/api/remove-from-cart/'+variant)
            .then(response =>  response.data).then(data =>(data.response!=200)).then(status=>this.active = status);
                  console.log(variant);
                } else {
                  swal("Have a nice day sir!");
                }
              });

        }
    },
    template:`
    <tr v-if="this.active">
    <td class="product_remove"><a @click.prevent="remove(variant_id)" href="#"><i class="fa fa-trash-o"></i></a></td>
    <td class="product_thumb"><a href="#"><img loading="lazy" :src="this.path+this.product.image" ></a></td>
    <td class="product_name"><a href="#">{{this.product.name}}</a></td>
    <td class="product_color"><a href="#">{{this.product.color}}</a></td>
    <td class="product_size"><a href="#">{{this.product.size}}</a></td>
    <td class="product-price">£ {{this.product.price}}</td>
    <td class="product_quantity"><label>Quantity</label> <input  :value="this.product.qty" type="number"></td>
    <td class="product_total">£ {{parseInt(this.product.price)*parseInt(this.product.qty)}}</td>
</tr>
    `
})

Vue.component('coupon', {

    template: `
    <div class="coupon_code left">
            <h3>Coupon</h3>
            <div class="coupon_inner">
                <p>Enter your coupon code if you have one.</p>
                <input disabled placeholder="Coupon code" type="text">
                <button disabled type="submit">Apply coupon</button>
            </div>
    </div>
    `
});

Vue.component('cart_total', {

    data: function () {
        return {
            message: "",
            subtotal:0,
            shipping:0,
            total:0
        }
    },
    mounted:function(){
        axios
            .get('/api/get-cart')
            .then(response =>  response.data).then(data =>((this.subtotal=data.sub)&&(this.shipping=data.shipping))).then(console.log(this.subtotal));
    },
    template: `
    <div class="coupon_code right">
            <h3>Cart Totals</h3>
            <div class="coupon_inner">
                    <div class="cart_subtotal">
                        <p>Subtotal</p>
                        <p class="cart_amount">£ {{this.subtotal}}</p>
                    </div>
                    <div class="cart_subtotal ">
                        <p>Shipping</p>
                        <p class="cart_amount"><span>Flat Rate:</span> £ {{this.shipping}}</p>
                    </div>

                    <div class="cart_subtotal">
                        <p>Total</p>
                        <p class="cart_amount">£ {{this.subtotal+this.shipping}}</p>
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
                <slot></slot>
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
    data:function(){
        return{
            path: "/front/assets/.uploads/products/thumbs/",
        }
    },
    methods:{
        showBig(image){
            this.$emit('changeBig', image);
        }
    },
    props: ['thumbimages'],
    template: `
    <div class=" col-md-2 single-zoom-thumb">
       <ul class="s-tab-zoom" id="gallery_01">
                             
            <li  v-for="(thumb,index) in thumbimages" :key="index">
                <a href="#" class="elevatezoom-gallery">
                    <img @click="showBig(thumb.image)" loading="lazy" :src="path+thumb.image" alt="zo-th-1">
                </a>
            </li>
        </ul>
    </div>
    `
});

Vue.component('productbigimage', {
    data: function(){
        return {
            path:"/front/assets/.uploads/products/"
        }
    },
    props: ['idtext', 'src', 'datazoom'],
    template: `
    <div id="img-1" class="col-md-10 zoomWrapper single-zoom">
        <a href="#">
            <img loading="lazy" :id="idtext" :src="path+src"  :data-zoom-image="datazoom" alt="big-1">
        </a>
    </div>
    `
});

Vue.component('imagescolumn', {
    data:function(){
        return {
            thumbs:this.images,
            big:this.bigImage
        }
    },
    mounted() {
        axios
            .get('/api/get-images/?product=' + this.variant[Object.keys(this.variant)[0]][0].product_id+"&color="+Object.keys(this.variant)[0])
            .then(response => (this.thumbs = response.data.images
            )).then(images => this.big = images[0]?images[0].image:null);
    },
    methods:{
        showBig(image){
            this.big = image;
        }
    },
    watch: {
        images: function (newVal, oldVal) { // watch it
            this.thumbs = newVal;
        },
        bigImage: function (newVal, oldVal) { // watch it
            this.big = newVal;
        }
    },
    props: ['images','bigImage', 'variant'],
    template: `
    <div class="col-lg-6 col-md-6">
        <div class="product-details-tab">
            <div class="row">
            
                <productthubslist @changeBig="showBig" v-if="this.thumbs" :thumbimages="this.thumbs"></productthubslist>
            
                <productbigimage v-if="this.big"                             
                    idtext="zoom1" 
                    :src = "this.big"
                    :datazoom = "this.big"
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
    props: ['colors', 'variants'],
    data: function () {
        return {
            imageUrl: "/front/assets/img/color/",
            colorName: null,
        }
    },
    methods: {
        selected: function (index) {
            this.$emit('color-selected', index);
            this.colorName = this.variants[index][0].color.name
        }
    },
    template: `
    <div class="product_variant color">
    <h4 v-if="!colorName">Select Color</h4>
    <ul>
        <li v-for="(color,index) in variants"  :key="index" class="color1">
        <div :style="'background:'+color[0].color.code" class="ml-2 btn btn-sm" data-toggle="tooltip" :title="color[0].color.name" @click.prevent="selected(index)">
        <div style="height:20px;width:20px;"></div> 
        </div>
        </li>
    </ul>
    <p v-if="colorName" style="font-weight:.5em">Selected color: {{this.colorName}}
    </p>
</div>
    `
});


Vue.component('product_availability', {
    props: ['qty'],
    computed: {
        message() {
            if (this.qty >= 1) {
                return "In";
            } else {
                return "Out of";
            }
        }
    },
    template: `
    <div class="product-availability">
        <i class="fa fa-wifi"></i> Availability: {{this.message}} Stock
    </div>
    `
});

Vue.component('product_extra_info', {
    props: ['details'],
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
        methods: {
            addToCart() {
                this.$emit('addToCart');
            }
        },
        template: `
    <button @click.prevent="addToCart" class="button add-to-cart" type="submit"><i class="fa fa-shopping-cart pull-left"></i>Add to cart</button>
    `
    }),


    Vue.component('product_quantity', {
        props: ['variant'],
        data: function () {
            return {
                count: 0
            }
        },
        methods: {
            up() {
                if ((this.count + 1) <= this.variant.qty)
                    this.count++;
                this.$emit('setQty', this.count);
            },
            down() {
                if ((this.count - 1) > 0)
                    this.count--;
                this.$emit('setQty', this.count);
            },
            addToCart() {
                console.log("Cart to be added");
                this.$emit('addToCart');
            }
        },
        template: `
    <div v-if="variant.qty > 0" class="product_variant quantity">
    <label>quantity</label>
    <input  name="quantity" type="text" :value="count" min="1" :max="variant.qty"></input>
    <div id="qty_count" style="display:flex;flex-direction:column;margin-right:1em">
        <div @click="up" class="plus fa fa-plus-circle"></div>
        <div @click="down" class="minus fa fa-minus-circle"></div>
    </div>
    <add_to_cart v-if="this.count > 0" @addToCart="addToCart"></add_to_cart>
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
    // Variant will be sorted by Color
    //  so loop will provide simple integration
    props: ['product', 'variants'],
    data: function () {
        return {
            selected: {
                variant: null,
                color: null,
                qty: null
            },
            cart: []
            ,
        }
    },
    methods: {
        selectColor: function (id) {
            console.log("Color selected in child VariantID:" + id);
            this.selected.color = id;
            this.$emit('colorChanged', id);
            this.selected.variant = null;
        },
        selectVariant: function (id) {
            console.log("Variantselected in child VariantID:" + id);
            this.selected.variant = id;
        },
        selectQuantity: function (qty) {
            console.log(" Quantity selected in child VariantID:" + qty);
            this.selected.qty = qty;
        },
        addToCart() {
            console.log("Quantity selected in child VariantID:" + this.selected);
            this.cart.push({ variant: this.selected.variant.id, qty: this.selected.qty });

            axios.post('/add-to-cart', {
                product:{
                    name: this.product.name,
                    price:this.product.price,
                    color:this.selected.variant.color.name,
                    size:this.selected.variant.size.name,
                    variant_id: this.selected.variant.id,
                    qty: this.selected.qty,
                    color_id: this.selected.variant.color_id
    
                }
            })
                .then(function (response) {
                    console.log(response.data.cart.length);
                    let cartQty = document.querySelector('#cart-qty');
                    cartQty.innerText = parseInt(response.data.cart.length);
                    swal("Great!", "This Product is added to cart! Buy more !", "success");

                })
                .catch(function (error) {
                    console.log(error);
                });
            // alert("hi");
        }
    },
    mounted() {
        console.log(this.product);
    },
    template: `
    <div class="col-lg-6 col-md-6">
        <div class="product_d_right">
            <form action="">
                <product_name :name="this.product.name"></product_name>
                <product_price_notice></product_price_notice>
                <product_price :price="this.product.price"></product_price>
                <product_description 
                    description_line_one="from 5 items: 9,40"
                    description_line_two="from 30 items: 8,21"
                ></product_description>
               
                <colors_variant :variants="variants" @color-selected="selectColor"></colors_variant>
                
                <size_variant v-if="variants[this.selected.color]"  :sizeVariants="variants[this.selected.color]" @variant-selected="selectVariant"></size_variant>
                <br>
                <product_availability v-if="this.selected.variant" :qty="this.selected.variant.qty"></product_availability>
                <br/>
                <product_quantity v-if="this.selected.variant"  :variant="this.selected.variant" @setQty="selectQuantity"  @addToCart="addToCart"></product_quantity>
            </form>
        </div>
    </div>      
    `
});


Vue.component('product_details', {
    props: ['images', 'product'],
    data: function () {
        return {
            variant: null,
            thumbs:null,
            big:null
        }

    },
    mounted() {
        axios
            .get('/get_variant/' + this.product.id)
            .then(response => (this.variant = response.data
            ));
    },
    methods:{
        requestNewImages(color){
            axios
            .get('/api/get-images/?product=' + this.product.id+"&color="+color)
            .then(response => (this.thumbs = response.data.images
            )).then(images => this.big = images[0].image);
        }
    },
    template: `
    <div class="product_details">
        <div class="row">
            <imagescolumn v-if="this.variant" :images="this.thumbs" :bigImage="this.big" :variant="this.variant" ></imagescolumn>
            <product_info @colorChanged="requestNewImages" v-if="this.variant" :variants="this.variant" :product="product"> </product_info>
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
    props: ['sizeVariants'],
    data: function () {
        return {
            listClass: "mr-2",
            selected: {
                size: {
                    name: null,
                    id: null,
                },
                variant: null
            }
        }
    },
    methods: {
        selectSize: function (index) {
            this.selected.variant = this.sizeVariants[index];
            this.$emit('variant-selected', this.selected.variant);
            console.log("selected:sizeid: " + this.sizeVariants[index].size_id);
            console.log("selected:Variant: " + this.sizeVariants[index].id);
            this.selected.size.name = this.sizeVariants[index].size.name;
        }
    },
    template: `
    <div class="product_size">
    <p style="float:right">SizeTable</p><br>
    <hr>
    <h4 v-if="!this.selected.size.name">Select Size</h4>
    <ul id="product_size">
        <li v-for="(variant, $index) in sizeVariants" :key="$index" class="mr-3">
            <button @click.prevent="selectSize($index)" :title="variant.size.name" class="btn btn-info">{{variant.size.name}}</button>
        </li>
    </ul>
    <p v-if="this.selected.size.name" style="color:grey;font-weight:.8em;margin-top:1em">Selected size : {{this.selected.size.name}}
    </p>
</div>
    `
});


Vue.component('product_article', {
    data: function () {
        return {
            link: "/singleProduct/",
            src: '/front/assets/.uploads/products/thumbs/',
        }
    },
    methods:{
        loadModal(index){
            this.$emit('loadModal', index);
            console.log("modal clicked"+ index);
        }
    },
    props: ['product', 'tab'],
    template: `<div class="" style="width: 241px;">
    <article class="single_product">
    <figure>
        <div class="product_thumb">
            <a class="primary_img" :href="this.link+this.product.id"><img loading="lazy" :src="this.src+this.product.thumb1" alt=""></a>
            <a class="secondary_img" :href="this.link+this.product.id"><img loading="lazy" :src="this.src+this.product.thumb2" alt=""></a>
            <div class="label_product_left label_product">
                <span class="label_sale_left">New</span>
            </div>
             <div class="label_product">
                <span class="label_sale">{{this.product.discount}}%</span>
            </div>
            <div class="action_links">
                <ul>
                    <li class="wishlist"><a @prevent href="#" title="" data-original-title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                    <li class="compare"><a href="#" title="" data-original-title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>
                    <li class="quick_button" @click.prevent="loadModal(product)"><a href="#" data-toggle="modal" data-target="#modal_box" title="" class="inner-search-back" data-original-title="10 colors | quick view"><i class="ion-ios-search-strong"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="product_content">
         <div class="product_timing">
                    <div :data-countdown="this.product.discount_till"><div class="countdown_area"><div class="single_countdown"><div class="countdown_number">2</div><div class="countdown_title">days</div></div><div class="single_countdown"><div class="countdown_number">07</div><div class="countdown_title">hours</div></div><div class="single_countdown"><div class="countdown_number">30</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">13</div><div class="countdown_title">secs</div></div></div></div>
                </div>
            <div class="product_content_inner">
                <h2 class="product_name_brand_name">{{this.product.brand}}</h2>
                <h3 class="product_name"><a :href="this.link+this.product.id">{{this.product.name}}</a></h3>
                <h4 class="product_name_h4"><a href="#">{{tab.name}}</a></h4>
                <div class="price_box">
                    <span class="old_price">Reg. $ {{this.product.price}}</span><br>
                    <span class="current_price">Sale $ {{this.product.price* (100-this.product.discount)/100}}</span>
                </div>
                <div class="countdown_text mb-3">
                   <!-- <a href="">Extra 15% off use:SUNDAY </a>-->
                    <a href="" v-if="this.product.free_shipping" class="chng-color">Free shipping at $ {{this.product.free_shipping}}</a>
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
</article></div>
    `
});



Vue.component('modal', {

    props:['product'],

    template: `
    <div  class="modal fade show" id="modal_box" tabindex="-1" role="dialog"  style="display:block">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img loading="lazy" :src="'/front/assets/img/product/'+this.product.thumb1" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img loading="lazy" src="<?=ASSETS?>/img/product/productbig3.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img loading="lazy" src="<?=ASSETS?>/img/product/productbig4.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img loading="lazy" src="<?=ASSETS?>/img/product/productbig5.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img loading="lazy" src="<?=ASSETS?>/img/product/product1.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img loading="lazy" src="<?=ASSETS?>/img/product/product6.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img loading="lazy" src="<?=ASSETS?>/img/product/product9.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img loading="lazy" src="<?=ASSETS?>/img/product/product14.jpg" alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>{{this.product.name}}</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>asse </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    `
});



Vue.component('tab_products', {
    data: function () {
        return {
            products: {
                images: {
                    thumb1: "/front/assets/img/product/thumb1.jpg",
                    thumb2: "/front/assets/img/product/thumb2.jpg",
                    all: ""
                }
            },
            tabProducts: null,
            count: 1,
            id: null,
        }
    },
    mounted() {
        console.log(typeof this.tab);
    },
    watch: {
        tab: function (newVal, oldVal) { // watch it
            console.log('Prop(tab) changed: ', newVal, ' | was: ', oldVal);
            axios
                .get('/api/get-product/' + this.tab.id)
                .then(response => ((response.status == 200) ? (this.tabProducts = response.data) && (this.count = 2) : null));
        }
    },
    methods:{
        loadModal(product){
            this.$emit('modal', product);
            // this.$emit('color-selected', index);
            console.log("emited to tab_product" + product);
        }
    },
    props: ['tab'],
    template: `
    <div>
        <section style="display:flex">
                <product_article   v-for="(product,index) in this.tabProducts" :key="index"
                    :product="product"
                    :tab="tab"
                    @loadModal="loadModal"
                ></product_article>    
           </section>   
        </div>
    `
});




Vue.component('related_products', {
    data: function () {
        return {
            products: {
                images: {
                    thumb1: "/front/assets/img/product/thumb1.jpg",
                    thumb2: "/front/assets/img/product/thumb2.jpg",
                    all: ""
                }
            },
            count: 5,
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
                    <div v-for="c in this.count" class="" style="width: 241px;"><article class="single_product"><figure><div class="product_thumb"><a href="/singleProduct/21" class="primary_img"><img loading="lazy" src="/front/assets/img/product/thumb1.jpg" alt=""></a> <a href="/singleProduct/21" class="secondary_img"><img loading="lazy" src="/front/assets/img/product/thumb2.jpg" alt=""></a> <div class="label_product_left label_product"><span class="label_sale_left">New</span></div> <div class="label_product"><span class="label_sale">10%</span></div> <div class="action_links"><ul><li class="wishlist"><a href="wishlist.html" title="" data-original-title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li> <li class="compare"><a href="#" title="" data-original-title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li> <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="" class="inner-search-back" data-original-title="10 colors | quick view"><i class="ion-ios-search-strong"></i></a></li></ul></div></div> <div class="product_content"><div class="product_timing"><div data-countdown="2019-12-31 00:00:00"><div class="countdown_area"><div class="single_countdown"><div class="countdown_number">09</div><div class="countdown_title">days</div></div><div class="single_countdown"><div class="countdown_number">06</div><div class="countdown_title">hours</div></div><div class="single_countdown"><div class="countdown_number">14</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">18</div><div class="countdown_title">secs</div></div></div></div></div> <div class="product_content_inner"><h2 class="product_name_brand_name">Club</h2> <h3 class="product_name"><a href="product-countdown.html">Men's Slim Fit Poplin Shart </a></h3> <h4 class="product_name_h4"><a href="">New ArriVal</a></h4> <div class="price_box"><span class="old_price">Reg. $773</span><br> <span class="current_price">Sale $695</span></div> <div class="countdown_text mb-3"><a href="" class="chng-color">Free shipping at $21</a></div> <div class="star_icon"><i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i> <i aria-hidden="true" class="fa fa-star"></i></div></div></div></figure></article></div>  
            </section> 

    </section>
    `
});

Vue.component('single_product_section', {

    data: function () {
        return {
            product: null,
        }
    },

    props: ['images', 'id'],
    mounted() {
        axios
            .get('/get_product/' + this.id)
            .then(response => (this.product = response.data
            ));
    },
    template: `
    <div>
        <product_details v-if="product" :product="product" :images="images"></product_details>
        <product_extra_info v-if="product" :details="this.product.details"></product_extra_info>
    </div>
    `
});



Vue.component('top_nav_bar', {

    template: `
    <nav>
        <ul>
            <li><a href="/">home</a></li>
            <li class="mega_items"><a href="#">shop</a></li>
            <li><a href="#">blog</a></li>
            <li><a class="#" href="#">pages</a></li>
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
            <a href="/"><img loading="lazy" :src="logo" alt="" style="max-width:120%;"></a>
    </div>
    `
});


Vue.component('top_bar_menu_item', {
    props: ['cat'],
    template: `<li class="top_bar_menu_item" style="width:150px">
                    <a href="/cat/<?=$cat->slug?>" class="dropbtn">
                            {{cat->name}}
                            <!--  
                            <i class="fa fa-caret-down"></i> -->
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
        user: function () {
            if (this.hasUser) {
                return true;
            } else {
                return false;
            }
        }
    },

    method: {
        logout: function () {
            event.preventDefault();
            document.getElementById('logout-form-top').submit();
        }
    },

    data: function () {
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
    <li><a :href="link">{{name}}</a></li>
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
    date: function () {
        return {
            catClassWithIcon: this.icon + " mr-10",
            link: '/cat/' + this.slug,
        }
    },
    props: ['icon', 'id', 'name', 'slug'],
    template: `
    <li class="menu_item_children"><a :href="'/cat/'+slug">
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
    props: ['cart_image', 'count'],
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
                    <miniCart :count="count"></miniCart>
                </div>
            </div>
        </div>
    `
});


Vue.component('miniCart', {

    data: function () {
        return {
            products: [{
                name: "something",
                image: "/front/assets/img/s-product/this.product.jpg",
                qty: 5,
                price: 100,
            },
            {
                name: "something",
                image: "/front/assets/img/s-product/this.product.jpg",
                qty: 1,
                price: 200,
            }
            ]
        }
    },

    computed: {
        // a computed getter
        total: function () {
            // counting total
            let count = 0;
            let t = 0;
            for (count; count < this.products.length; count++) {
                t += this.products[count].qty * this.products[count].price;
            }
            return t;
        }
    },
    props:['count'],

    template: `
    <div class="header_configure_area">
            <div class="header_wishlist">
                <a href="/cart">
                    <span id="cart-qty" class="wishlist_count" style="padding-bottom:4em;padding-left:4em;">{{count}}</span>
                </a>
            </div>
            <div class="mini_cart_wrapper">
                <a href="javascript:void(0)">
                        <div class="cart_img_page ">
                        <a href="/cart"><img loading="lazy" src="/front/assets/img/logo/cart.png" alt="" /></a>
                        </div>
                </a>
                <!--mini cart
                <div class="mini_cart">
                    <div class="mini_cart_inner">
                        
                    
                        <div class="cart_item" v-for="product in this.products">
                            <div class="cart_img">
                                <a href="#"><img loading="lazy" :src="this.product.image" alt=""></a>
                            </div>
                            <div class="cart_info">
                                <a href="#">Sit voluptatem rhoncus sem lectus</a>
                                <p>Qty: {{ this.product.qty}} X <span> $ {{this.product.price}} </span></p>
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
                mini cart end-->
            </div>
        </div>
    `
});

var eventBus = new Vue();





new Vue({
    el: "#app",
    data: {
        tabs: null,
        selected: {
            tab: '',
            tabProducts: ''
        },
        product:null,
        qty: 1,
        product: {
            qty: 5,

            images: {
                big: "/front/assets/img/product/thumb1.jpg",
                thumb: {
                    img1: "/front/assets/img/product/thumb1.jpg",
                    img2: "/front/assets/img/product/thumb2.jpg",
                    img3: "/front/assets/img/product/2a.jpg",
                    img4: "/front/assets/img/product/2b.jpg",
                    img5: "/front/assets/img/product/3a.jpg"
                }
            },
        }
    },
    mounted() {
        axios
            .get('/api/get-product-tags')
            .then(response => ((response.status == 200) ? (this.tabs = response.data) && ((this.selected.tab = this.tabs[0])) : null));

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
            this.this.product.images["img-normal"] = this.this.product.images.thumb[index];
        },
        updateTabProducts(tab) {
            console.log(tab);
            this.selected.tab = tab;
        },
        loadModal(product){
            console.log("emited to parent" + product);
            this.product = product;
        }
    }

})