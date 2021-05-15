@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Serviceman</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  table-bordered table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Sr #</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Age</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @if(isset($servicemen))
                                @foreach($servicemen as  $serviceman)
                                    @if(isset($serviceman))


                                        <tr>
                                            <td>{{$count}}</td>

                                            <td>{{$serviceman['imageUrl']}}</td>

                                            <td>{{$serviceman['name']}}</td>
                                            <td>{{$serviceman['mobile']}}</td>
                                            <td>{{$serviceman['age']}}</td>
                                            <td>{{$serviceman['role']}}</td>

                                            <td>
                                                <a href="viewserviceman/{{$serviceman['id']}}">
                                                    <button class="btn btn-primary">View</button>
                                                </a>
                                            </td>


                                        </tr>
                                        @php($count++)
                                    @endif

                                @endforeach
                            @endif


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