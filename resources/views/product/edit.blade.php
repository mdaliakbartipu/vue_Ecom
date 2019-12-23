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


<div class="row">

    <div class="col-sm-8">
        <div class="widget-header">
            <h4 class="widget-title"> @yield('page-header')</h4>

            @include('layouts.includes.msg')

        </div>

        <div class="widget-body">
            <div class="widget-main">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Product Name </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" class="form-control" name="name" value="{{ $product->name }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Search Category</label>

                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" id="category" name="category">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $product->category_id)?'selected':''  }}>
                                    {{ $category->name }}

                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Search Sub Category</label>

                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" id="sub_category" name="sub_category">
                                @foreach($subcategories as $subcat)
                                <option value="{{ $subcat->id }}" {{ ($subcat->id == $product->sub_category_id)? 'selected':'' }}>{{ $subcat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <script>
                        $('#category').on('load', function(e) {

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
                        $('#sub_category').on('load', function(e) {

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
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Search Sub sub Category</label>

                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" name="sub_sub_category" id="sub_sub_category">
                                @foreach($subsubcats as $subsubcat)
                                <option value="{{ $subsubcat->id }}" {{ ($subsubcat->id == $product->sub_sub_category_id)?'selected':'' }}>{{ $subsubcat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Search Brand</label>

                        <div class="col-xs-12 col-sm-9">
                            <select class="chosen-select form-control" id="brand" name="brand">
                                <option value="0">Select Brand</option>
                                @foreach($brand as $item)
                                <option value="{{ $item->id }}" {{($item->id==$product->brand)?'selected':''}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Product Code </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Product Code" class="form-control" name="pro_code" value="{{ $product->code }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Product Short Description </label>

                        <div class="col-sm-9">
                            <textarea type="text" id="form-field-1-1" placeholder="Product short Description" class="form-control summernote" name="desc">{{ $product->description }}</textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Product Price </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Product price" class="form-control" name="price" value="{{ $product->price }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Product Discount </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1-1" placeholder="Product Discount" class="form-control" name="discount" value="{{ $product->discount }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Product Details </label>

                        <div class="col-sm-9">
                            <textarea type="text" id="form-field-1-1" placeholder="Product short Description" class="form-control summernote" name="details">{{ $product->details }}</textarea>

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"> Sleeve</label>

                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">
                                @foreach($sleeves as $key=>$sleeve)
                                <label>
                                    <input type="checkbox" class="ace " name="sleeve" value="{{ $sleeve->id }}" <?= ($product->sleeve == ($key + 1)) ? "checked='checked'" : ''; ?>>

                                    <span class="lbl"> {{ $sleeve->name }} </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"> Leg Length</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">
                                @foreach($leglenghts as $key=>$leglength)
                                <label>
                                    <input type="checkbox" class="ace" name="leglength" value="{{ $leglength->id }}" <?= ($product->leglength == ($key + 1)) ? "checked='checked'" : ''; ?>>
                                    <span class="lbl"> {{ $leglength->name }} </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"> Fit</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">
                                @foreach($fits as $key=>$fit)
                                <label>
                                    <input type="checkbox" class="ace" name="fit" value="{{ $fit->id }}" <?= ($product->fit == ($key + 1)) ? "checked='checked'" : ''; ?>>
                                    <span class="lbl"> {{ $fit->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="width:100%">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"> Tags</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">
                                @foreach($tags as $key=>$tag)
                                <label>
                                    <?php
                                    $selected = false;
                                    foreach ($productTags as $ptag) :
                                        if ($ptag->tag_id == $tag->id)
                                            $selected = true;
                                    endforeach;
                                    ?>
                                    <input type="checkbox" class="ace" name="tags[]" value="{{ $key+1 }}" <?= $selected ? 'checked' : '' ?>>
                                    <span class="lbl"> {{ $tag->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <h2>Variants</h2>
                    <div class="" style="width:150%">
                        <div class="table-responsive">
                            <table id="table" class="table" style="width:100%">

                                <tbody>

                                    <?php foreach ($variants as $key=>$variant) : ?>
                                        <tr class="row">
                                            <td class="col-md-2">
                                                <div>
                                                    <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Color..." name="color[]">
                                                        @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}" {{$color->id==$variant[0]->color_id?'selected':''}}>{{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="col-md-2">
                                            @foreach($variant as $item)
                                                <div>
                                                    <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Size..." name="size[]">
                                                        @foreach($sizes as $size)
                                                        <option value="{{ $size->id }}" {{$size->id==$item->size_id?'selected':''}}>{{ $size->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endforeach
                                            </td>
                                            <td class="col-md-2">
                                            @foreach($variant as $item)  
                                                <div>
                                                    <input disabled type="text" id="form-field-1-1" placeholder="Product quantity" class="form-control" name="quantity[]" value="{{$item->qty}}" />
                                                </div>
                                            @endforeach
                                            </td>
                                            <td class="col-md-6">
                                            @foreach($images[$key] as $image)
                                                <img height="40px" width="40px" src="/front/assets/.uploads/products/thumbs/<?=$image->image?>" alt=""> <button class="delete-image btn btn-sm btn-danger" style="font-size:.5em"><i class="fa fa-close"></i></button>
                                            @endforeach
                                                <div style="margin-top:1em">
                                                    <input multiple="" type="file" id="id-input-file-3" name="image[0][]" />
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"></label>

                        <div class="col-xs-12 col-sm-6">

                            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                            <!-- <a href="" class="btn btn-info"> <i class="fa fa-list"></i> Edit Variants </a> -->

                        </div>

                    </div>

                </form>

            </div>
        </div>


    </div>
</div>








@endsection
@section('js')
<script type="text/javascript">
    let rowIndex = 1;
    //  will start by naming name from adding 2 as postfix

    $('.delete-image').click(function(){
        event.preventDefault();
        alert("Image deletion not yet implemented");
    });
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