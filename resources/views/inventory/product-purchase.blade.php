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
                        <input type="hidden" id="product" name="product" value="{{$product->id}}">
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
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Web ID </label>

                        <div class="col-sm-9">
                        <input type="hidden" id="form-field-1-1" placeholder="Product Code" class="form-control" name="code" value="{{ $product->code }}" />    
                        <input disabled type="text" id="form-field-1-1" placeholder="Product Code" class="form-control" value="{{ $product->code }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Product Short Description </label>

                        <div class="col-sm-9">
                            <textarea type="text" id="form-field-1-1" placeholder="Product short Description" class="form-control" name="desc">{{ $product->description }}</textarea>

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
                                <?php
                                    $selected = false;
                                    foreach ($productAttributes as $item) :
                                        if ($item->attribute_id == $sleeve->id)
                                            $selected = true;
                                    endforeach;
                                ?>
                                <label>
                                    <input type="checkbox" class="ace " name="sleeve[]" value="{{ $sleeve->id }}" <?= $selected ? 'checked' : '' ?>>

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
                                <?php
                                    $selected = false;
                                    foreach ($productAttributes as $item) :
                                        if ($item->attribute_id == $leglength->id)
                                            $selected = true;
                                    endforeach;
                                ?>
                                <label>
                                    <input type="checkbox" class="ace" name="leglength[]" value="{{ $leglength->id }}" <?= $selected ? 'checked' : '' ?>>
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
                                <?php
                                    $selected = false;
                                    foreach ($productAttributes as $item) :
                                        if ($item->attribute_id == $fit->id)
                                            $selected = true;
                                    endforeach;
                                ?>
                                <label>
                                    <input type="checkbox" class="ace" name="fit[]" value="{{ $fit->id }}" <?= $selected ? 'checked' : '' ?>>
                                    <span class="lbl"> {{ $fit->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"> Feature </label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">

                                <label>
                                    <input type="radio" class="ace" name="new" value="1" <?=$product->new?'checked':''?>>
                                    <span class="lbl"> New </span>
                                </label>
                                <label>
                                    <input type="radio" class="ace" name="new" value="0" <?=$product->new?'':'checked'?>>
                                    <span class="lbl"> Repeat </span>
                                </label>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Rating</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="ace" name="rating" <?=$product->rating_default?'checked':''?>>
                                    <span class="lbl"> Set </span>
                                </label>
                                <input type="text" name="rating_default" value="<?=$product->rating_default??0?>" placeholder="(If not auto) Default Rating">
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

                    <div class="form-group">
                        <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Discount</label>
                        <div class="col-xs-12 col-sm-9 col-md-4">
                            <div class="checkbox">
                                <label>    
                                    <span class="lbl"> Amount</span>
                                </label>
                                <input type="text" name="discount" placeholder="Discount per 100" value="<?=$product->discount??0?>"> %
                            </div>
                            <div class="checkbox">
                                <label>    
                                    <span class="lbl"> Duration</span>
                                </label>

                                <?php

                                    //getting how many days left for that discount

                                    // get date from database
                                    $nowTime = new DateTime(now());
                                    $discount_till = new DateTime($product->discount_till??$nowTime);
                                    //difference
                                    $diff = $discount_till->diff($nowTime);
                                ?>
                                <input type="text" name="discount_days" placeholder="Discount per 100" value="<?=$diff->days??0?>"> Days
                                <?php
                                if($nowTime < $discount_till): ?>
                                    <span> <?=$diff->h??0?> Hours <?=$diff->i??0?> Minutes <?=$diff->s??0?> Seconds left </span> 
                                <?php endif;?>
                                

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Embroidery & Print</label>

                        <div class="col-sm-9">
                            <input type="file" name="embroidery">
                            <a class="btn btn-sm btn-secondary" target="_blank" href="/front/assets/.uploads/products/pdf/<?=$product->embroidery?>">View</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1"> Video link</label>

                        <div class="col-sm-9">
                            <input type="text" name="video" placeholder="Associate video link" value="<?=$product->video_link?>"> 
                            <a class="btn btn-sm btn-secondary" target="_blank" href="<?=$product->video_link?>">Play</a>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                    <div style="width:150%">
                        <h2>Variants</h2><button class="purchase btn btn-warning">purchase</button><br/><br/>
                        <p class="text-warning">You can Update imges here. But You shouldn't changes color or sizes or quantity.It shows that what you have right now.
                            <br>If you have purchased new product then Click To Purchase</p>
                    </div>
                    <div class="" style="width:150%">
                        <div class="table-responsive">
                            <table id="table" class="table" style="width:100%">

                                <tbody>
                                    <?php foreach ($variants as $key=>$variant) : ?>
                                        <tr class="row">
                                            <td class="col-md-2">
                                                <div>
                                                    <select disabled class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Color..." name="color[]">
                                                        @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}" {{$color->id==$variant[0]->color_id?'selected':''}}>{{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                </div>
                                            </td>
                                            <td class="col-md-2">
                                            @foreach($variant as $item)
                                                <div>
                                                    <select disabled class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Size..." name="size[]">
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
                                                <img onclick="showBig(this)" style="margin-top:5px" height="60px" width="60px" src="/front/assets/.uploads/products/thumbs/<?=$image->image?>" alt=""> <button class="btn btn-sm btn-danger"  onClick="deleteImage(this)" style="font-size:.5em" id="<?=$image->image?>"><i class="fa fa-close"></i></button>
                                            @endforeach
                                                <div style="margin-top:1em">
                                                    <input multiple="" type="file" id="id-input-file-3" name="image[{{$variant[0]->color_id}}][]" />
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