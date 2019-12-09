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
                  <h4 class="card-title "> Update Slider</h4>
                  
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('slider.update', $slider->id) }}"  enctype="multipart/form-data">
                         {{ csrf_field() }}
                       {{ method_field('PUT') }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Title</label>
                          <input type="text" class="form-control" name="sub_title"  value="{{ $slider->sub_title }}">
                        </div>
                       </div>
                      </div>

                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Slug</label>
                          <input type="text" class="form-control" name="slug"  value="{{ $slider->slug }}">
                        </div>
                       </div>
                      </div>
                      
                      <div class="row">
                      <div class="col-md-4">
                         <label class="control-label input-file">Image left</label>
                          <input type="file" name="image_1" id="image1">
                       </div>
                       <div class="col-md-4">
                         <label class="control-label input-file">Image right</label>
                          <input type="file" name="image_2" id="image2">
                       </div>
                      </div>

                      <div style="margin-top:20px">
                              <button type="submit" class="btn btn-primary"> Save </button>
                              <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>                     
                      </div>
                       
                    </form>
                  </div>
                </div>
              </div>
            </div>
            

@endsection

@push('scripts')

@endpush

