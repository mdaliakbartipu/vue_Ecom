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
                  <h4 class="card-title "> Update Blog</h4>
                  
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('blog.update',$blog->id) }}"  enctype="multipart/form-data">
                         {{ csrf_field() }}
                       {{ method_field('PUT') }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                        </div>
                       </div>
                      </div><div class="box">
            <div class="box-header">
              <h3 class="box-title">Write Message Here
                <small>Simple and fast</small>
              </h3>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body pad">
              
        <textarea  name="desc" class="summernote"
style="width: 50%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">       {{ $blog->desc }}
  </textarea>
            
            </div>
          </div>         
                      
                      <div class="row">
                      <div class="col-md-2">
                         <label class="control-label">Image</label>
                          <input type="file" name="image" class="input-file-image">
                       </div>
                      </div>
            <br/>
                       <button type="submit" class="btn btn-primary"> Save </button>
                      <a href="{{route('blog.index')}}" class="btn btn-danger">Back</a>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
            

@endsection



@push('scripts')
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
@endpush

