    <!-- Plugins JS -->
    <script src="<?=ASSETS?>/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="<?=ASSETS?>/js/main.js"></script>
	
 <!-- Main JS -->
	<script src="<?=ASSETS?>/js/owl.carousel.min.js"></script>
<script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                margin: 10,
                nav: false,
                loop: true,
				autoplay:false,
				autoplayTimeout:1000,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items: 1
                
                  }
                }
              })
            })
     </script>