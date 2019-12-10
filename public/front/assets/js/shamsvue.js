// Define a new component called button-counter
Vue.component('button-counter', {
    data: function() {
        return {
            count: 0
        }
    },
    template: '<button v-on:click="count++">You clicked me {{ count }} times.</button>'
})




new Vue({
    el: "#app",
    data: {
        qty: 1,
        product: {
            images: {
                "img-normal": "/front/assets/img/product/productbig5.jpg",
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

});

Vue.config.devtools = true;