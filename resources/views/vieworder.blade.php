@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h5>View Order: {{$order['orderId']}}  @if($order['orderStatus']=='Cancelled')
            <span class="badge bg-danger">{{$order['orderStatus']}}</span>
        @elseif($order['orderStatus']=='Completed')
            <span class="badge bg-success">{{$order['orderStatus']}}</span>
        @elseif($order['orderStatus']=='Pending')
            <span class="badge bg-primary">{{$order['orderStatus']}}</span>
        @elseif($order['orderStatus']=='Under Process')
            <span class="badge bg-warning">{{$order['orderStatus']}}</span>
        @endif</h5>

@stop

@section('content')
    {{--order details--}}
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card callout callout-info">
                <div class="card-header">
                    <h3 class="card-title">Order Details</h3>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p> Service Id: {{$order['orderId']}}</p>
                            <p> Service Time: {{$order['date'].' '.$order['chosenTime']}}</p>
                        </div>
                        <div class="col-4">
                            <p> Service Date: {{$order['date']}}</p>
                            <p> Service Time: {{$order['chosenTime']}}</p>
                        </div>
                        <div class="col-4">
                            <p> Service Name: {{$order['serviceName']}}</p>
                            Total Price: Rs {{$order['totalPrice']}}
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
    {{--order details end--}}

    {{--user details--}}
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card callout callout-info">
                <div class="card-header">
                    <h3 class="card-title">User Details</h3>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p> Name: {{$order['user']['firstname']}}</p>
                            <p> Phone: {{$order['user']['phone']}}</p>
                        </div>
                        <div class="col-6">
                            <p> Building type: {{$order['buildingType']}}</p>
                            <p> Address: {{$order['user']['googleAddress']}}</p>

                        </div>

                    </div>

                </div>
                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
    {{--user details end--}}
    {{--instructions--}}
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card callout callout-info">
                <div class="card-header">
                    <h5><i class="fas fa-info"></i> Instructions </h5>


                </div>
                <div class="card-body">
                    {{$order['instructions']}}
                </div>

                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
    {{--instructions end--}}
    {{--Service Items--}}
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title">Services Booked</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body  table-bordered table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>Item #</th>
                            <th>Task</th>
                            <th>Quantity</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($order['countModelArrayList']))
                            @php($count=1)
                            @foreach($order['countModelArrayList'] as  $item)

                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$item['service']['name']}}</td>
                                    <td>{{$item['quantity']}}</td>


                                </tr>
                                @php($count++)
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
    {{--service item end--}}
    {{--pictures--}}
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title">Service Pictures</h3>
                </div>
                <!-- /.card-header -->
                @if(!empty($pictures))
                    <div class="card-body">
                        0
                        @if($pictures['before']!=null)
                            <p> Before Work Pictures</p>
                            <div class="row">

                                @foreach($pictures['before'] as $before=>$value)
                                    <div class="col-lg-2 col-6">
                                        <a href="{{$pictures['before'][$before]}}" target="_blank"><img width="100"
                                                                                                        target="_blank"
                                                                                                        class="img-thumbnail mt-1"
                                                                                                        src="{{$pictures['before'][$before]}}"></a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <hr class="style10">
                        @if($pictures['after']!=null)
                            <p> After Work Pictures</p>
                            <div class="row">

                                @foreach($pictures['after'] as $after=>$value)
                                    <div class="col-lg-2 col-6">
                                        <a href="{{$pictures['after'][$after]}}" target="_blank"> <img width="100"
                                                                                                       class="img-thumbnail mt-1"
                                                                                                       src="{{$pictures['after'][$after]}}"></a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <hr class="style10">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                At Shop
                                @if($pictures['shop']!=null)
                                    <a href="{{$pictures['shop']}}" target="_blank"> <img width="100"
                                                                                          class="img-thumbnail"
                                                                                          src="{{$pictures['shop']}}"></a>
                                @endif
                            </div>
                            <div class="col-lg-6 col-6">
                                Client Signed
                                @if($pictures['client']!=null)
                                    <a href="{{$pictures['client']}}" target="_blank"> <img width="100"
                                                                                            class="img-thumbnail"
                                                                                            src="{{$pictures['client']}}"></a>
                                @endif


                            </div>
                        </div>

                    </div>
            @endif
            <!-- /.card-body -->

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
