@extends('layouts.master')
@section('title','Form')
@section('page-header')
<i class="fa fa-plus-circle"></i> Product
@stop
@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
.form-field-1{
    height:3em !important;
    width:100%;
}
.lbl{
    color:black !important;
}
.checkbox label, .radio label{
    padding-left:10px !important;
}

.input-icon.input-icon-right>input{
    width:319px !important;
}


.input-icon.input-icon-right>.ace-icon {
    left: auto;
    right: 3px;
    font-size: 1.12em;
    padding-top: 5px;
    padding-right: 13px;
}

.btn-light{
    width:100%;
    text-align:left
}

</style>

@stop


@section('content')


<div class="row">

    <div class="col-sm-12">
        <div class="widget-header">
            <h4 class="widget-title"> @yield('page-header')</h4>
            @include('layouts.includes.msg')

        </div>

        <div class="widget-body">
            <div class="widget-main">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                   
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Product Name</span>
                        </span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" class="form-field-1" placeholder="Product Name" class="form-control" name="name" value="{{old('name')}}" />																
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Product Hover Name</span>
                        </span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" class="form-field-1" placeholder="Product Hover Name" class="form-control" name="hover_name" value="{{old('hover_name')}}" />
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="col-sm-3 " for="form-field-1"><span class="btn btn-light arrowed-right">Product Front Images </label>
                        <div class="col-sm-9">
                            <label class="label label-xlg label-grey arrowed-in-right arrowed-in">
                                        <i class="fa fa-image"></i>
                                        Upload Front Image
                                        <input type="file" name="front-image" style="display:none">
                            </label>
                            <span id="front-image-show"></span>
                            &nbsp;&nbsp;
                            <label class="label label-xlg label-grey arrowed-in-right arrowed-in">
                                <i class="fa fa-image"></i>
                                    Upload Hover Image
                                <input type="file" name="hover-image" style="display:none">
                            </label>
                            <span id="hover-image-show"></span>
                        </div>
                    </div> -->


                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Search Category</span>
                        </span>
                        </label>

                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" id="category" name="category">
                                <option value="0">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Search Sub Category</span>
                        </span>
                        </label>

                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" id="sub_category" name="sub_category">
                                {{-- @foreach($subcategories as $subcat)
                                     <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <script>
                        $('#category').on('change', function(e) {

                            let $id = e.target.value;
                            let $subCat = $('#sub_category');
                            //console.log($id);
                            $.get('/get-sub/ajax/' + $id, function(data) {
                                //success data
                                $subCat.empty();

                                $subCat.append('<option>-- Choose one --</option>');
                                $.each(JSON.parse(data), function(index, Obj) {
                                    console.log(index);

                                    $subCat.append('<option value=' + Obj.id + '>' + Obj.name + '</option>');
                                });
                            });
                        });
                        $('#sub_category').on('change', function(e) {

                            let $id = e.target.value;
                            let $subSubCat = $('#sub_sub_category');
                            //console.log($id);
                            $.get('/get-sub/sub/ajax/' + $id, function(data) {
                                //success data
                                $subSubCat.empty();

                                $subSubCat.append('<option>-- Choose one --</option>');
                                $.each(JSON.parse(data), function(index, Obj) {
                                    console.log(index);

                                    $subSubCat.append('<option value=' + Obj.id + '>' + Obj.name + '</option>');
                                });
                            });
                        });
                    </script>
                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Search Super Category</span>
                        </span>
                        </label>


                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" name="sub_sub_category" id="sub_sub_category">
                                {{-- @foreach($subsubcats as $subsubcat)
                                        <option value="{{ $subsubcat->id }}">{{ $subsubcat->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Brand Name</span>
                        </span>
                        </label>

                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" id="brand" name="brand">
                                <option value="0">Select Brand</option>
                                @foreach($brand as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Web ID </span>
                        </span>
                        </label>


                        <div class="col-sm-9">
                            <input type="text" class="form-field-1" placeholder="Product Code" class="form-control" name="code" value="{{old('code')}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Regular Price</span>
                        </span>
                        </label>



                        <div class="col-sm-9">
                            <input type="text" class="form-field-1" placeholder="Product price" class="form-control" name="price" value="{{old('price')}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Product Details</span>
                        </span>
                        </label>

                        <div class="col-sm-9">
                            <textarea type="text" placeholder="Product Details" class="form-control summernote" name="details" style="width:unset!important">{{old('details')}}</textarea>
                        </div>
                    </div>


                    <div class="form-group">
                       
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2"> Feature</span>
                        </span>
                        </label>
                       
                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">

                                <label>
                                    <input type="radio" class="ace" name="new" value="1" checked>
                                    <span class="lbl"> New </span>
                                </label>
                                <label>
                                    <input type="radio" class="ace" name="new" value="0">
                                    <span class="lbl"> Repeat </span>
                                </label>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                       
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2"> Rating</span>
                        </span>
                        </label>
                       
                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="ace" name="rating">
                                    <span class="lbl"> Set </span>
                                </label>
                                <input type="text" name="rating_default" value="4.6" placeholder="(If not auto) Default Rating">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2">  Collection Tags</span>
                        </span>
                        </label>


                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">
                                @foreach($tags as $key=>$tag)
                                <label style="margin-top:5px">
                                    <input type="checkbox" class="ace" name="tags[]" value="{{ $key+1 }}">
                                    <span class="lbl label label-xlg label-light"> {{ $tag->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2"> Discount</span>
                        </span>
                        </label>


                        <div class="col-sm-9">
                            <span class="input-icon input-icon-right">
                                <input type="text" class="form-field-1" id="form-field-icon-1" name="discount" value="0">
                                <i class="ace-icon fa fa-leaf blue"> discount in %</i>
                            </span>

                            <span class="input-icon input-icon-right">
                                <input type="text" class="form-field-1" id="form-field-icon-2" name="discount_days" value="0">
                                <i class="ace-icon fa fa-leaf green"> discount for (days)</i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">            
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2"> Vat & Ship</span>
                        </span>
                        </label>
                       
                       
                       
                        <div class="col-sm-9">
                        <span class="input-icon input-icon-right">
                                <input type="text" class="form-field-1" id="form-field-icon-1" name="vat" value="0">
                                <i class="ace-icon blue"> vat in %</i>
                        </span>
                        <span class="input-icon input-icon-right">
                            <input type="text" class="form-field-1" id="form-field-icon-1" name="delivery_time" value="0">
                            <i class="ace-icon green"> delivery time (days)</i>
                        </span>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2"> Embroidery & Print</span>
                        </span>
                        </label>

                        <div class="col-sm-9">
                            <label class="label label-xlg label-info arrowed-in-right arrowed-in">
                                <i class="fa fa-upload"></i>
                                Upload FIle
                                <input type="file" name="embroidery" style="display:none">
                            </label>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 " >
                        <span class="btn btn-light arrowed-right">
                        <input class="ace" type="checkbox" checked>
						<span class="lbl p-2"> Video link</span>
                        </span>
                        </label>

                        <div class="col-sm-9 ">
                            <input type="text" class="form-field-1" name="video" placeholder="Associate video link">
                        </div>
                    </div>



                    <!-- Product Variant Section -->

                    <div class="card-body" style="width:100%">
                        <div class="table-responsive">
                            <table id="table" class="table" style="width:100%">
                                <thead class=" text-primary">
                                    <th> Select Color </th>
                                    <th> Select Size </th>
                                    <th> Quantity </th>
                                    <th> Image </th>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>

                                            <div class="col-sm-20">
                                                <select class="chosen-select form-control form-field-1" id="form-field-select-3" data-placeholder="Choose a Color..." name="color[]">
                                                    @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>

                                            <div class="col-md-20">
                                                <select class="chosen-select form-control form-field-1" id="form-field-select-3" data-placeholder="Choose a Size..." name="size[]">
                                                    @foreach($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-field-1" placeholder="Product quantity" class="form-control" name="quantity[]" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12">

                                                <label class="label label-xlg label-info arrowed-in-right arrowed-in">
                                                    <i class="fa fa-image"></i>
                                                    Upload Images
                                                    <input multiple="" type="file" id="id-input-file-3" name="image[0][]" style="display:none" />

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <a href="" class="btn btn-purple col-lg-2 pull-right" id="addrows">
                                <span class="glyphicon glyphicon-plus"></span> Add
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 "></label>


                        <div class="col-xs-12 col-sm-6">

                            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-yellow" type="Reset"> <i class="fa fa-refresh"></i> Reset</button>
                            <a href="" class="btn btn-info"> <i class="fa fa-list"></i> List</a>

                        </div>
                    </div>

                </form>

            </div>
        </div>


    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>
<script type="text/javascript">
    // tags 

    var rowIndex = 1;
    //  will start by naming name from adding 2 as postfix


    $("#addrows").click(function() {
        event.preventDefault();
        console.log(rowIndex);
        $('#table tr:last').after(`<tr>
      <td>   <div class="col-md-20">
      <select class="chosen-select form-control form-field-1"  name="color[]">
                 @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                 @endforeach
      </select> </div> </td>
      <td>     <div class="col-md-20">
       <select class="chosen-select form-control form-field-1" id="form-field-select-3"  name="size[]">
                 @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select> </div> </td>
      <td> <div class="col-sm-9">
               <input type="text" class="form-control form-field-1" placeholder="Product Quantity" name="quantity[]" /> 
          </div > </td>
      <td> <div class="col-xs-12 col-sm-12">
                 <input multiple="" type="file" id="id-input-file-3" name="image[${rowIndex++}][]" />
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


            $('#chosen-multiple-style .btn btn-light').on('click', function(e) {
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
            btn btn-light_choose: 'Drop files here or click to choose',
            btn btn-light_change: null,
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
                'applyClass': 'btn btn-light-success',
                'cancelClass': 'btn btn-light-default',
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

<!--autocomplete-->
<script type="text/javascript">
    jQuery(function($) {
        //autocomplete
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#tags").autocomplete({
            source: availableTags
        });

    });
    $('.summernote').summernote({
        placeholder: 'Write short description about your products',
        tabsize: 2,
        height: 300,

    });
</script>






@stop