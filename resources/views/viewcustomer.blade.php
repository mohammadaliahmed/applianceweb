@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer details: </h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Username: {{$customer['username']}}</h3>
                        <br>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @csrf

                        <div class="row">
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required
                                           value="{{$customer['firstname'] .' '.$customer['lastname']}}"
                                           name="name"
                                           placeholder="Type Here">
                                    <input type="text" class="form-control" required
                                           value="{{$customer['username'] }}"
                                           name="username"
                                           hidden
                                           placeholder="Type Here">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" required value="{{$customer['mobile'] }}"
                                           name="phone"
                                           placeholder="Type Here">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" required value="{{$customer['email'] }}"
                                           name="email"
                                           placeholder="Type Here">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>City</label>
                                    @if(isset($customer['city']))
                                        <input type="text" class="form-control" required value="{{$customer['city'] }}"
                                               name="city"
                                               placeholder="Type Here">
                                    @else
                                        <input type="text" class="form-control"
                                               name="city"
                                               placeholder="Type Here">
                                    @endif


                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" required value="{{$customer['address'] }}"
                                           name="address"
                                           placeholder="Type Here">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Google Address</label>
                                    <textarea type="text" class="form-control" required

                                              name="googleAddress"
                                              placeholder="Type Here"> @if(isset($customer['city'])){{$customer['googleAddress'] }}@endif </textarea>
                                </div>
                            </div>
                        </div>


                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Order details
                    </div>

                    <div class="card-body  table-bordered table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Id</th>
                                <th>Service</th>
                                <th>Building type</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count=1)
                            @foreach($orders as  $order)

                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$order['orderId']}}</td>
                                    <td>{{$order['serviceName']}}</td>
                                    <td>{{$order['buildingType']}}</td>
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
                                        <a href="../vieworder/{{$order['orderId']}}">
                                            <button class="btn btn-primary">View</button>
                                        </a>
                                    </td>


                                </tr>
                                @php($count++)

                            @endforeach


                            </tbody>
                        </table>
                    </div>
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