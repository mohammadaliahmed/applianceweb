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
                        <h3 class="card-title">List of orders</h3>

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
                    <div class="card-body  table-bordered table-responsive p-0" style="height: 900px;width:100%">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Service</th>
                                <th>Building type</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th style="width: 10px">Address</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as  $order)

                                <tr>
                                    <td>{{$order['orderId']}}</td>
                                    <td>{{$order['serviceName']}}</td>
                                    <td>{{$order['buildingType']}}</td>
                                    <td>{{$order['chosenTime']}}</td>
                                    <td>{{$order['user']['fullName']}}</td>
                                    @if(isset($order['user']['googleAddress']))
                                        <td style="width: 500px">{{$order['user']['googleAddress']}}</td>
                                    @else
                                        <td style="width: 500px"></td>
                                    @endif
                                    <td>Rs.{{$order['totalPrice']}}</td>
                                    <td>
                                        @if($order['orderStatus']=='Cancelled')
                                            <span class="badge bg-danger">{{$order['orderStatus']}}</span>
                                        @elseif($order['orderStatus']=='Completed')
                                            <span class="badge bg-success">{{$order['orderStatus']}}</span>
                                        @elseif($order['orderStatus']=='Pending')
                                            <span class="badge bg-primary">{{$order['orderStatus']}}</span>
                                        @elseif($order['orderStatus']=='Under Process')
                                            <span class="badge bg-warning">{{$order['orderStatus']}}</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="vieworder/{{$order['orderId']}}">
                                            <button class="btn btn-primary">View</button>
                                        </a>
                                    </td>


                                </tr>

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