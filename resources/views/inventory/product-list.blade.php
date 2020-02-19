@extends('layouts.master')
@section('title','Inventory')
@section('page-header')
<i class="fa fa-list"></i> Inventory
@stop
@section('css')

<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}" />
<style type="text/css">
    .pagination {
        padding-left: 0;
        margin-top: -30px;
        border-radius: 4px;
        margin-right: 20px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

@stop

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Products</h4>

                        @include('layouts.includes.msg')

                    </div>
                    <div class="card-body" id="inventor">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered text-center" style="width:100%">
                                <thead class="text-center">
                                    <th class="text-center"> Web ID </th>
                                    <th class="text-center"> Color </th>
                                    <th class="text-center"> Size </th>
                                    <th class="text-center"> Quantity </th>
                                    <th class="text-center"> Action </th>
                                </thead>
                                <tbody id="tBody">
                                    <tr class="tRow"> 
                                            <td>
                                                <select class="name" name="product">
                                                    <option value="">Select By WebID</option>
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product->id ?>"><?= $product->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </td>
                                            <td>
                                                <select class="color" name="color[]" id="">
                                                    <option value="">Select Color</option>
                                                    <?php foreach ($colors as $color) : ?>
                                                        <option value="<?= $color->id ?>"><?= $color->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="size" name="size[]" id="">
                                                    <option value="">Select Size</option>
                                                    <?php foreach ($sizes as $size) : ?>
                                                        <option value="<?= $size->id ?>"><?= $size->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td><input class="qty" type="text" name="qty[]" placeholder="Quantity"></td>
                                            <td><button onclick="addRow(this)" class="btn btn-info"> <i class="fa fa-plus"></i>Add</button></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            @endsection

            @section('js')

            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
            <script>
                $('.js-data-example-ajax').select2({
                    ajax: {
                        url: '/api/products',
                        dataType: 'json'
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    }
                });

                // adding another row each time user clicks to any "add button"
                function addRow(that) {
                    event.preventDefault();
                    var sbutton = that;
                    var $name = that.parentElement.parentElement.getElementsByClassName('name')[0].value;
                    var $color = that.parentElement.parentElement.getElementsByClassName('color')[0].value;
                    var $size = that.parentElement.parentElement.getElementsByClassName('size')[0].value;
                    var $qty = that.parentElement.parentElement.getElementsByClassName('qty')[0].value;
                  
                    if($name && $color && $size && $qty){
                        // alert("all iz well");
                        axios
                    .post('/api/inventory/add', {
                        product: $name,
                        color: $color,
                        size: $size,
                        qty: $qty,
                        _token: '<?=csrf_token()?>',
                    })
                    .then(function (response) {
                        gotIt(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                        swal.fire("Sorry! Something went wrong!");
                    });
                        // save data to server
                        // get result
                        // change icon of add
                        // add another row
                    } else {
                        return false;
                    }
                


                    var thisRow = that.parentElement.parentElement;
                    const rparent = document.getElementById('tBody');
                    // const rchild = thisRow.getElementsByClassName('tRow')[0]
                    const cchild = thisRow.cloneNode(true);
                    
                    var dis = thisRow.getElementsByTagName('select');
                    for(var $in=0 ; $in <dis.length; $in++){
                        dis[$in].disabled = true;
                    }
                    // diasble input for qty
                    thisRow.getElementsByTagName('input')[0].disabled = true;
                    thisRow.getElementsByTagName('button')[0].disabled = true;
                    // rchild.getElementsByTagName('select');

                    rparent.appendChild(cchild);
                    
                    // const tRow = document.createElement('tr');
                    // var name = document.createElement('td');
                    // name.innerHTML = `<input  type="text" name="product" placeholder="search your product">`;
                    // tRow.appendChild(name)
                    // var color = document.createElement('td');
                    // color.innerHTML = `<input type="text" name="color" placeholder="Select Color">`;
                    // tRow.appendChild(color)
                    // var size = document.createElement('td');
                    // size.innerHTML = `<input type="text" name="size" placeholder="Select Size">`;
                    // tRow.appendChild(size)
                    // var qty = document.createElement('td');
                    // qty.innerHTML = `<input type="text" name="qty" placeholder="Quantity">`;
                    // tRow.appendChild(qty)
                    // var add = document.createElement('td');
                    // add.innerHTML = `<button onclick="addRow()" class="btn btn-info"> <i class="fa fa-plus"></i>Add</button>`
                    // tRow.appendChild(add)
                    // // Appending all td to tr
                    // rparent.appendChild(tRow)
                }

                // Click On Purchase and make Purchase
                function purchase() {
                    alert("hello")
                }

                function gotIt(data){
                    console.log(data);
                    if(data.status==200){

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Quantity Added!',
                            showConfirmButton: false,
                            timer: 1500,
                            width:'300px',
                            height:'200px'
                            })
                        // alert success
                        // change button green

                    } else{
                        swal.fire("Sorry! Server says Error!!");
                    }

                }
            </script>
            <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
            <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
            <script src="{{ asset('assets/js/moment.min.js') }}"></script>
            <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>

            <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>

            <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
            <script src="{{ asset('assets/js/ace.min.js') }}"></script>

            <!-- inline scripts related to this page -->
            <script type="text/javascript">
                function delete_check(id) {
                    Swal.fire({
                        title: 'Are you sure ?',
                        html: "<b>You want to delete permanently !</b>",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        width: 400,
                    }).then((result) => {
                        if (result.value) {
                            $('#deleteCheck_' + id).submit();
                        }
                    })

                }

                function delete_all_check() {
                    Swal.fire({
                        title: 'Are you sure?',
                        html: "<b>You want to delete permanently !</b>",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        width: 400,
                    }).then((result) => {
                        if (result.value) {
                            $('#deleteAllCheck').submit();
                        }
                    })
                }
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
                            // .off('resize.chosen')
                            .on('resize.chosen', function() {
                                $('.chosen-select').each(function() {
                                    var $this = $(this);
                                    $this.next().css({
                                        'width': '300px'
                                    });
                                    // $this.next().css({'width': $this.parent().width()});
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
                                // $this.next().css({'width': $this.parent().width()});
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
                    $(".input-products").autocomplete({
                        source: availableTags
                    });

                });

            </script>

            


            @stop