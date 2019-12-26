<script src="<?=ASSETS?>/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?=ASSETS?>/js/axios.min.js"></script>
    <script src="<?=ASSETS?>/js/vue.js"></script>
    <script src="<?=ASSETS?>/js/shamsvue.js"></script>
    <script src="<?=ASSETS?>/js/main.js"></script>
    <!-- Plugins JS -->
    <script src="<?=ASSETS?>/js/owl.carousel.min.js"></script>
    <script src="<?=ASSETS?>/js/wow.min.js"></script>
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

<script>
  function GetUnique(item) {
    var outputArray = [];
    var classes = temp_c = [];
    var cols = ['col-md-1', 'col-md-2', 'col-md-3', 'col-md-4', 'col-md-6', 'col-md-12',
        'col-sm-1', 'col-sm-2', 'col-sm-3', 'col-sm-4', 'col-sm-6', 'col-sm-12',
        'col-lg-1', 'col-lg-2', 'col-lg-3', 'col-lg-4', 'col-lg-6', 'col-lg-12',
        'col-xs-1', 'col-xs-2', 'col-xs-3', 'col-xs-4', 'col-xs-6', 'col-xs-12',
        'col-xl-1', 'col-xl-2', 'col-xl-3', 'col-xl-4', 'col-xl-6', 'col-xl-12'];
    $(item).each(function() {
        var temp = $(item + ' > div').attr('class').split(/\s+/);
        for (var i = 0; i < temp.length; i++) {
            classes.push(temp[i]);
        }
    });
    for (var i = 0; i < classes.length; i++) {
        temp_c = classes[i].split('-');
        if (temp_c.length == 2) {
            temp_c.push('');
            temp_c[2] = temp_c[1];
            temp_c[1] = 'xs';
            classes[i] = temp_c.join("-");
        }
        if ($.inArray(classes[i], outputArray) == -1) {
            if ($.inArray(classes[i], cols)) {
                outputArray.push(classes[i]);
            }
        }
    }
    return outputArray;
}

</script>


