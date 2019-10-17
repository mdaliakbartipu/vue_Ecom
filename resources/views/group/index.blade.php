@extends('layouts.master')
@section('title','Group')
@section('page-header')
    <i class="fa fa-list"></i> Groups
@stop
@section('css')

@stop


@section('content')

    <div class="page-header">

        <a class="btn btn-xs btn-info" href="{{ route('group.create') }}" style="float: right; margin: 0 2px;"> <i class="fa fa-plus"></i> Add @yield('title') </a>

        <h1>
            @yield('page-header')
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12">

            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Group Name</th>
                        <th>Phone </th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Logo</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($groups as $key => $group)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->phone }}</td>
                            <td>{{ $group->email }}</td>
                            <td>{{ $group->address }}</td>
                            <td>
                                <img src="{{ asset('uploads/'.$group->logo) }}" alt="{{ $group->name }}" style="width: 60px;">
                            </td>
                            <td>
                                <a href="#view-details{{ $group->id }}" role="button" data-toggle="modal" class="btn btn-sm btn-info" title="View Details">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('group.edit',$group->id) }}" class="btn btn-sm btn-success" title="Published">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <button type="button" onclick="delete_check({{ $group->id }})" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <form action="{{ url('group.destroy',$group->id)}}" id="deleteCheck_{{ $group->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    @foreach($groups as $group)

        <div id="view-details{{ $group->id }}" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger">View @yield('title') Details</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-12">

                                <dl id="dt-list-1" class="dl-horizontal">

                                    <dt>Group Name</dt>
                                    <dd>{{ $group->name }}</dd>

                                    <dt>Group email</dt>
                                    <dd>{{ $group->email }}</dd>

                                    <dt>Group Phone</dt>
                                    <dd>{{ $group->phone }}</dd>

                                    <dt>Group Address</dt>
                                    <dd>{{ $group->address }}</dd>

                                    <dt>Group Logo</dt>
                                    <dd><img src="{{ asset('uploads/') }}" alt=""></dd>

                                    <dt>Created At</dt>
                                    <dd></dd>

                                    <dt>Updated At</dt>
                                    <dd></dd>

                              </dl>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal">
                            <i class="ace-icon fa fa-times"></i>
                            Cancel
                        </button>

                    </div>
                </div>
            </div>

        </div>

    @endforeach

@endsection

@section('js')

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

    </script>


    <script type="text/javascript">

        jQuery(function($) {
            $('#dynamic-table').DataTable({
                "ordering": false,
                // install laravel datatable this package
                // https://github.com/yajra/laravel-datatables
                // processing: true,
                // serverSide: true,
                {{--ajax: '{{ url('') }}',--}}
                // columns:[
                //     {"data":"first_name"},
                //     {"data":"last_name"},
                // ],
                "bPaginate": true,
            });

        })
    </script>
@stop