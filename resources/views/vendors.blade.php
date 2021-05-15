@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vendors</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Vendors</h3>

                        <div class="card-tools">


                            <a href="addvendor">
                                <button class="btn btn-primary">Add Vendor</button>
                            </a>

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body  table-bordered table-responsive p-0" style="height: 900px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Picture</th>
                            <th>City</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($count=1)
                        @foreach($vendors as  $vendor)

                            <tr>
                                <td>{{$count}}</td>

                                <td>
                                    @if(isset($vendor['picUrl']))
                                        <img src="{{$vendor['picUrl']}}" width="150" class="img-thumbnail">
                                    @else
                                        <img width="150" class="img-thumbnail">
                                    @endif
                                </td>
                                <td>{{$vendor['city']}}</td>
                                <td>{{$vendor['name']}}</td>
                                <td>{{$vendor['phone']}}</td>
                                <td>{{$vendor['email']}}</td>
                                <td>{{$vendor['username']}}</td>
                                <td>
                                    @if($vendor['active'])
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif


                                </td>
                                <td>
                                    <a href="viewvendor/{{$vendor['username']}}">
                                        <button class="btn btn-primary">View</button>
                                    </a>
                                </td>


                            </tr>
                            @php($count++)
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop