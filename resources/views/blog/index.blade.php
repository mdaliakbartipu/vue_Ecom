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
                <a href="{{route('blog.create')}}" class="btn btn-primary" style="margin-top:1em">Add new</a>
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title ">Blog</h4>
                  
                @include('layouts.includes.msg')    
                
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th> ID </th>
                        <th> Title </th>
                        <th> Author </th>
                       {{--  <th> Description </th> --}}
                        <th> Image </th>
                        <th> Action </th>
                      </thead>
                      <tbody>
                        @foreach($blogs as $key=>$blog)
                        <tr>
                            <td> {{ $key +1 }} </td>
                            <td> {{ $blog->title }} </td>
                            <td> {{ $blog->author_name }} </td>
                          
                            <td>
                                <img class="img-responsive img-thumbnail" src="front/assets/.uploads/blogs/<?=$blog->image?>"  style="height: 50px; width: 30px;" alt="">
                            </td>
                           
                 
                 

                 <td> <a href="{{route('blog.edit',$blog->id)}} "  style="margin-right:10px"><span class="glyphicon glyphicon-edit"></span>  </a>
                
             
                    
        <form id="delete-form-{{ $blog->id }}" method="POST" action="{{ route('blog.destroy',$blog->id)}}" style="display: none;">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
        </form>
        <a 
        onclick="if(confirm('Are you sure to delete')){
            event.preventDefault();
            document.getElementById('delete-form-{{ $blog->id }}').submit();       
        }else {
            event.preventDefault();
        }"><span class="glyphicon glyphicon-trash"></span></a>

  </td>


       </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            

@endsection

@push('scripts')
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
@endpush