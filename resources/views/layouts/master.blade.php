
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title') - {{ config('app.name') }}</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <!-- bootstrap & fontawesome -->
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

    <!-- Rich text editor -->
    
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

    <!-- page specific plugin styles -->


    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}" />
    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.min.css') }}" />
    <![endif]-->
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <!--[if lte IE 8]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('css')
</head>

<body class="no-skin">
@include('partials._header')

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    @include('partials._sidebar')

    <div class="main-content">
        <div class="main-content-inner">

            @include('partials._breadcrumbs')

            <div class="page-content">

            @include('partials._settings')

                <!-- /.ace-settings-container -->

                @yield('content', 'Default Content')
    
            <!-- /.row -->
            </div><!-- /.page-content -->


        </div>
    </div><!-- /.main-content -->

@include('partials._footer')
</div><!-- /.main-container -->


<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script src="/front/assets/js/axios.min.js"></script>

<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<!-- ace scripts -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

<!-- rich text editor -->
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

@yield('js')


<!-- <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>


    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script> -->


<script>
        $('.summernote').summernote({
            placeholder: 'Write short description about your products',
            tabsize: 2,
            height: 300,
            width: 800
        });

    
$('.input-file').ace_file_input({
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

 </script>



<script type="text/javascript">

    if("{{session()->get('message')}}")
    swal.fire({
        title: "Success",
        text: "{{ session()->get('message') }}",
        type: "success",
        timer: 3000
    });
    elseif("{{session()->get('error')}}")
    swal.fire({
        title: "Error",
        text: "{{ session()->get('error') }}",
        type: "error",
        timer: 3000
    });
    endif

</script>
</body>
</html>