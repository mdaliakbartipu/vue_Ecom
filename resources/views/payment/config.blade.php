@extends('layouts.master')
@section('title','Table')
@section('page-header')
<i class="fa fa-list"></i> Table
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

@stop

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="container">
    <h1>Please set your online payment option</h1>
    <form action="/settings/payment" method="POST">
    @csrf
        
        <div class="row">
            <div class="form-group col-md-3">
                <label for="option">Options</label>
                <select name="host" id="options" class="form-control">
                    <option value="paypal" <?=($config->host=='paypal')?'selected':'' ?> >Paypal</option>
                    <option value="sslcom" <?=($config->host=='sslcom')?'selected':'' ?>>SSL Commerz</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="store_id">Store ID / Client ID</label>
                <input class="form-control" type="text" name="store_id" id="store_id" value="<?=$config->store_id??null?>">
            </div>
            <div class="form-group col-md-3">
                <label for="store_id">Store Secret</label>
                <input class="form-control" type="text" name="store_password" id="store_id" value="<?=$config->store_password??null?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="store_id">API URL</label>
                <input class="form-control" type="text" name="api_url" id="store_id" value="<?=$config->api_url??null?>">
            </div>

            <div class="form-group col-md-2">
                <button type="submit" style="margin-top:2em" class="form-control btn btn-info">Save</button>
            </div>
        </div>

    </form>

</div>

@endsection

@section('js')

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


<script type="text/javascript">
    jQuery(function($) {
        $('#dynamic-table').DataTable({
            "ordering": false,
            // install laravel datatable this package
            // https://github.com/yajra/laravel-datatables
            // processing: true,
            // serverSide: true,
            {
                {
                    --ajax: '{{ url('
                    ') }}', --
                }
            }
            // columns:[
            //     {"data":"first_name"},
            //     {"data":"last_name"},
            // ],
            "bPaginate": true,
        });

    })
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
        $("#tags").autocomplete({
            source: availableTags
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>


@stop


<!--@push('scripts')
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"> </script>
<script>
   $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>
@endpush  --!>