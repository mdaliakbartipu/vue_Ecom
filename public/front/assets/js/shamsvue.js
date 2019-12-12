// Define a new component called button-counter

Vue.component('productblock', {
    props: ['listlink', 'listdata'],
    template: `
    <li>
        <a class="text-la" :href="listlink">listdata</a>
    </li>
    `
})




Vue.component('vuelist', {
    props: ['listlink', 'listdata'],
    template: `
    <li>
        <a class="text-la" :href="listlink">listdata</a>
    </li>
    `
})


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
})

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
})

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
})

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
})



var singleVue = new Vue({
    el: "#singleProduct",
    data: {
        qty: 1,
        product: {   
            images:{
                "img-normal":"/front/assets/img/product/productbig5.jpg",
                thumb:{
                    img1 : "/front/assets/img/product/productbig1.jpg",
                    img2 : "/front/assets/img/product/productbig2.jpg",
                    img3 : "/front/assets/img/product/productbig3.jpg",
                    img4 : "/front/assets/img/product/productbig4.jpg",
                    img5 : "/front/assets/img/product/productbig5.jpg"
                }
            },
        }
    },
    components: {
        zoomOnHover: zoomOnHover
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
        selectImage(index){
            this.product.images["img-normal"] = this.product.images.thumb[index];  
        }
    }
});
