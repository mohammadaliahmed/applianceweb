@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Reports</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Reports</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  table-bordered table-responsive p-0" >
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>


                            <tr>
                                <td>1</td>
                                <td>Order Comparison</td>

                                <td>
                                    <a href="ordercomparison">
                                        <button class="btn btn-primary">View</button>
                                    </a>
                                </td>


                            </tr>


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