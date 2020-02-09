<script src="<?=asset('assets/js/jquery-2.1.4.min.js')?>"></script>
<script src="<?=asset('assets/js/ace-extra.min.js')?>"></script>
<script src="<?=ASSETS?>/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?=ASSETS?>/js/sweetalert2@9.js"></script>
    <script src="<?=ASSETS?>/js/axios.min.js"></script>
    <script src="<?=ASSETS?>/js/vue.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script> -->
    <script src="<?=asset('dist/shams.js')?>"></script>
    <!-- Plugins JS -->
    <script src="<?=ASSETS?>/js/owl.carousel.min.js"></script>
    <script src="<?=ASSETS?>/js/wow.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <![endif]-->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
    </script>
    <!-- ace scripts -->
    <script src="<?=asset('assets/js/bootstrap.min.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

<script>
  <?php if (\Session::get('success')) : ?>
    Notiflix.Notify.Success('<?= \Session::get('success') ?>');
  <?php endif; ?>
  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      margin: 10,
      nav: false,
      loop: true,
      autoplay: false,
      autoplayTimeout: 1000,
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
      'col-xl-1', 'col-xl-2', 'col-xl-3', 'col-xl-4', 'col-xl-6', 'col-xl-12'
    ];
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

$('.summernote').summernote({
            placeholder: 'Write short description about your products',
            tabsize: 2,
            height: 300,
            width: 800
        });



if("<?=session()->get('message')?>")
    swal.fire({
        title: "Success",
        text: "<?=session()->get('message')?>",
        type: "success",
        timer: 3000
    });
    else if("<?=session()->get('error')?>")
    swal.fire({
        title: "Error",
        text: "<?=session()->get('error')?>",
        type: "error",
        timer: 3000
    });

</script>


