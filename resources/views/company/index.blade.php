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
                  
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('company.update',$company->id) }}"  enctype="multipart/form-data">
                         {{ csrf_field() }}
                       {{ method_field('PUT') }}
                   

                       <h3 class="card-title ">Company Info</h3>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                        </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" value="{{ $company->title }}">
                        </div>
                       </div>
                      </div>

                      
                      <div class="row">
                      
                      </div>
                      
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="text" class="form-control" name="phone" value="{{ $company->phone }}">
                        </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fax</label>
                          <input type="text" class="form-control" name="fax" value="{{ $company->fax }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email" value="{{ $company->email }}">
                        </div>
                       </div>
                       <div class="col-md-2">
                         <label class="control-label">Company Logo</label>
                          <input type="file" name="logo" class="input-file">
                       </div>
                       
                      </div>
                     
                    
                       <div class="row">
                     
                      </div>

                      <h3>Social links</h3>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Facebook</label>
                          <input type="text" class="form-control" name="facebook" value="{{ $company->facebook }}">
                        </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Twitter</label>
                          <input type="text" class="form-control" name="twitter" value="{{ $company->twitter }}">
                        </div>
                       </div>

                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Instagram</label>
                          <input type="text" class="form-control" name="instagram" value="{{ $company->instagram }}">
                        </div>
                       </div>

                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Linkedin</label>
                          <input type="text" class="form-control" name="linkedin" value="{{ $company->linkedin }}">
                        </div>
                       </div>
                      </div>
                      

                       <button type="submit" class="btn btn-primary"> Save </button>
                      <a href="{{route('company.index')}}" class="btn btn-danger">Back</a>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
            

@endsection

@push('scripts')

@endpush

