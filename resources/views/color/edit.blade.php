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

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            @include('layouts.includes.msg')            
        </div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> Update Color</h4>
                  
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('color.update',$color->id) }}"  enctype="multipart/form-data">
                         {{ csrf_field() }}
                       {{ method_field('PUT') }}
                    

            <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Color Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $color->name }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Hex <a target="_blank" href="https://www.color-hex.com/color-names.html"> <b> Colors List</b></a></label>
                          <input type="text" class="form-control" name="hex" value="{{ $color->hex }}">
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rgb <a target="_blank" href="https://rgbcolorcode.com/color/converter/"> <b> Hex2Rgb</b></a></label>
                          <input type="text" class="form-control" name="rgb" value="{{ $color->rgb }}">
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pantone <a target="_blank" href="https://codebeautify.org/rgb-to-pantone-converter"> <b> Rgb2Pantone</b></a></label>
                          <input type="text" class="form-control" name="pantone" value="{{ $color->pantone }}">
                        </div>
                       </div>
                      </div>  

                      <div class="row" style="margin-bottom:1em">
                      <div class="col-md-2">
                         <label class="control-label">Image</label>
                          <input type="file" name="image" id="image">
                       </div>
                      </div>
                     <button type="submit" class="btn btn-primary"> Save </button>
                      <a href="{{route('color.index')}}" class="btn btn-danger">Back</a>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
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

        function delete_check(id)
        {
            Swal.fire({
                title: 'Are you sure ?',
                html: "<b>You want to delete permanently !</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width:400,
            }).then((result) =>{
                if(result.value){
                    $('#deleteCheck_'+id).submit();
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
                width:400,
            }).then((result)=> {
                if(result.value)
                {
                    $('#deleteAllCheck').submit();
                }
            })
        }

    </script>


    <script type="text/javascript">

        jQuery(function($) {
            $('#dynamic-table').DataTable({
                "ordering": false,
                "bPaginate": true,
            });

        })
    </script>

    <!--  Select Box Search-->
    <script type="text/javascript">



        jQuery(function($){

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                // .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({'width': '300px'});
                            // $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
                //resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                        // $this.next().css({'width': $this.parent().width()});
                    })
                });


                $('#chosen-multiple-style .btn').on('click', function(e){
                    var target = $(this).find('input[type=radio]');
                    var which = parseInt(target.val());
                    if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
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
                thumbnail: 'small'//large | fit

            }).on('change', function(){
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });


        });

    </script>

    <!--date range picker-->
    <script type="text/javascript">
        jQuery(function($) {


            $('.input-daterange').datepicker({autoclose:true});


            //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
            $('input[name=date-range-picker]').daterangepicker({
                'applyClass' : 'btn-sm btn-success',
                'cancelClass' : 'btn-sm btn-default',
                locale: {
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel'
                }
            })
                .prev().on(ace.click_event, function(){
                $(this).next().focus();
            });

        })
    </script>

    <!--datepicker plugin-->
    <script type="text/javascript">
        jQuery(function($) {

            $('.date-picker').datepicker({
                autoclose: true,
                format:'yyyy-mm-dd',
                todayHighlight: true
            })
            //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
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
            $( "#tags" ).autocomplete({
                source: availableTags
            });

        });
    </script>

  <!-- CK Editor -->
<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<script src="{{asset('/bower_components/ckeditor/ckeditor.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
@stop  

@push('scripts')
 

@endpush

