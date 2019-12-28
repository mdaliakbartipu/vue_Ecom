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
                  <h4 class="card-title "> Company Informations on Web</h4>
                  
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('company.update',$company->id) }}"  enctype="multipart/form-data">
                         {{ csrf_field() }}
                       {{ method_field('PUT') }}
                   


                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Head office</label>
                          <input type="text" class="form-control" name="head_office" value="{{ $company->head_office }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Factory</label>
                          <input type="text" class="form-control" name="factory" value="{{ $company->factory }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact Name</label>
                          <input type="text" class="form-control" name="contact_name" value="{{ $company->contact_name }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Position</label>
                          <input type="text" class="form-control" name="position" value="{{ $company->position }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone NO</label>
                          <input type="text" class="form-control" name="phone_number" value="{{ $company->phone_number }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fax</label>
                          <input type="text" class="form-control" name="fax" value="{{ $company->fax }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email" value="{{ $company->email }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control" name="country" value="{{ $company->country }}">
                        </div>
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Top text</label>
                          <input type="text" class="form-control" name="top_text" value="{{ $company->top_text }}">
                        </div>
                       </div>
                      </div>
                       <div class="row">
                      <div class="col-md-2">
                         <label class="control-label">Company Logo</label>
                          <input type="file" name="logo">
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
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
@endpush

