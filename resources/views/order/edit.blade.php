@extends('layouts.master')
@section('title','Form')
@section('page-header')
<i class="fa fa-plus-circle"></i> Product
@stop
@section('css')
<style>
    .checkbox label,
    .radio label {
        margin-bottom: 21px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@stop


@section('content')

<h1>Order edit</h1>

@endsection
@section('js')

<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
<script type="text/javascript">

    let rowIndex = 1;
    //  will start by naming name from adding 2 as postfix

    function deleteImage(e){
        event.preventDefault();
        // axios call and remove
        axios
            .get('/api/delete-image/?image='+e.id)
            .then(response => ((response.status == 200) ? (Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Image deleted',
                            showConfirmButton: false,
                            timer: 1500
                            })&&(document.getElementById(e.id).innerText ='')): null));

        console.log(e.id);
    };

function showBig(e){
    console.log(e.src);
    Swal.fire({
    imageUrl: e.src,
    imageWidth: 600,
    imageHeight: 300,
    imageAlt: 'Custom image',
})
}


// If clicked on imaages

// Swal.fire({
//       title: `${result.value.login}'s avatar`,
//       imageUrl: result.value.avatar_url
//     })


// Images end click



// purchase

    $('.purchase').click(async function(){
        event.preventDefault();

                const productID = document.getElementById('product').value;

                const attributesAPI = '/api/get-attributes/'+productID
                var adata = null;
                const attributes = fetch(attributesAPI)
                .then(response => response.json())
                .then(data=>doAsk(data));

                async function doAsk(data){
                    // console.log(data.colors)
                    colors = data.colors
                    sizes = data.sizes 
                    colorObject = {}
                    sizeObject = {}
                    colors.forEach((color,key) =>
                        // color will be data
                        colorObject[color.id] = color.name
                        )
                        sizes.forEach((size,key) =>
                        // color will be data
                        sizeObject[size.id] = size.name
                        )

                        // asking for model

                        const { value: color } = await Swal.fire({
                        title: 'Select Product Colors',
                        input: 'select',
                        inputOptions: colorObject,
                        inputPlaceholder: 'Select a Color',
                        showCancelButton: true,
                        });

                        if (color) {
                    const { value: size } = await Swal.fire({
                    title: 'Select Product Sizes',
                    input: 'select',
                    inputOptions: sizeObject,
                    inputPlaceholder: 'Select a Size',
                    showCancelButton: true,
                    });

                    if(size){
                        const { value: qty } = await Swal.fire({
                        title: 'Enter Quantity',
                        input: 'text',
                        showCancelButton: true
                        });
                    if(qty){
                        // swal.fire(`you selected ${color} ${size} ${qty}`);
                        swal.fire("Real Purchase is forbidden for now.It will open soon after testing (Need to talk about it)");

                    }                        
                    };
                    
                }
                console.log(colorObject); 
                }                  
            });

// purchase end
    
    $("#addrows").click(function() {
        event.preventDefault();
        console.log(rowIndex);
        $('#table tr:last').after(`<tr>
      <td>   <div class="col-md-20">
      <select class="chosen-select form-control"  name="color[]">
                 @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                 @endforeach
      </select> </div> </td>
      <td>     <div class="col-md-20">
       <select class="chosen-select form-control" id="form-field-select-3"  name="size[]">
                 @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select> </div> </td>
      <td> <div class="col-sm-9">
               <input type="text" class="form-control" placeholder="Product Quantity" name="quantity[]" /> 
          </div > </td>
      <td> <div class="col-xs-12 col-sm-12">
                 <input multiple="" type="file" id="id-input-file-3" name="image[]" />
     </div> </td>
     <td>
     <a href="#" type="submit" class="btn btn-danger delete"> X
      </a> </td>

      </tr>`);

        $(".delete").click(function() {
            event.preventDefault();
            $(this).closest("tr").remove();
        });

    });
</script>

<!-- Side Bar -->
<script type="text/javascript">
    jQuery(function($) {
        $('#sidebar2').insertBefore('.page-content');
        $('#navbar').addClass('h-navbar');
        $('.footer').insertAfter('.page-content');

        $('.page-content').addClass('main-content');

        $('.menu-toggler[data-target="#sidebar2"]').insertBefore('.navbar-brand');


        $(document).on('settings.ace.two_menu',
            function(e, event_name, event_val) {
                if (event_name == 'sidebar_fixed') {
                    if ($('#sidebar').hasClass('sidebar-fixed')) $('#sidebar2').addClass('sidebar-fixed')
                    else $('#sidebar2').removeClass('sidebar-fixed')
                }
            }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed', $('#sidebar').hasClass('sidebar-fixed')]);

        $('#sidebar2[data-sidebar-hover=true]').ace_sidebar_hover('reset');
        $('#sidebar2[data-sidebar-scroll=true]').ace_sidebar_scroll('reset', true);
    })
</script>

<!-- Snippet -->

<script type="text/javascript">
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>


<!--  Select Box Search-->
<script type="text/javascript">
    jQuery(function($) {

        if (!ace.vars['touch']) {
            $('.chosen-select').chosen({
                allow_single_deselect: true
            });
            //resize the chosen on window resize

            $(window)
                .off('resize.chosen')
                .on('resize.chosen', function() {
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({
                            'width': $this.parent().width()
                        });
                    })
                }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if (event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({
                        'width': $this.parent().width()
                    });
                })
            });


            $('#chosen-multiple-style .btn').on('click', function(e) {
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if (which == 2) $('#form-field-select-4').addClass('tag-input-style');
                else $('#form-field-select-4').removeClass('tag-input-style');
            });
        }

    })
</script>

<!--Drag and drop-->
<script type="text/javascript">
    jQuery(function($) {


        $('#id-input-file-3').ace_file_input({
            style: 'well',
            btn_choose: 'Drop files here or click to choose',
            btn_change: null,
            no_icon: 'ace-icon fa fa-cloud-upload',
            droppable: true,
            thumbnail: 'small' //large | fit

        }).on('change', function() {
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });


    });
</script>

<!--date range picker-->
<script type="text/javascript">
    jQuery(function($) {


        $('.input-daterange').datepicker({
            autoclose: true
        });


        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('input[name=date-range-picker]').daterangepicker({
                'applyClass': 'btn-sm btn-success',
                'cancelClass': 'btn-sm btn-default',
                locale: {
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel'
                }
            })
            .prev().on(ace.click_event, function() {
                $(this).next().focus();
            });

    })
</script>

<!--datepicker plugin-->
<script type="text/javascript">
    jQuery(function($) {

        $('.date-picker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            })
            //show datepicker when clicking on the icon
            .next().on(ace.click_event, function() {
                $(this).prev().focus();
            });

    })
</script>

@stop