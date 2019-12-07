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