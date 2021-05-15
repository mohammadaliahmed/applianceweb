@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">

                            <a href="addservice/">
                                <button class="btn btn-outline-info"> Add Service</button>
                            </a>
                        </div>

                    </div>

                    <div class="card-body  table-bordered table-responsive p-0" style="height: 900px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position in app</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @if($services>0)
                                @foreach($services as  $service)

                                    <tr>
                                        <td>{{$count}}</td>
                                        <td><img src="{{$service['imageUrl']}}" width="100"></td>
                                        <td>{{$service['name']}}</td>
                                        <td>{{$service['position']}}</td>
                                        <td><a href="viewservice/{{$service['name']}}">
                                                <button class="btn btn-primary">View</button>
                                            </a>
                                            <a class="px-2 " href="../deleteservice/{{$service['name']}}">
                                                <button class="btn btn-danger">Delete
                                                </button>
                                            </a>

                                        </td>


                                    </tr>
                                    @php($count++)
                                @endforeach
                            @endif


                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-header -->

                    <!-- /.card -->
                </div>
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