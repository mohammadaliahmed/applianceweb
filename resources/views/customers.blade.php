@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customers</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of customers</h3>

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
                <div class="card-body  table-bordered table-responsive p-0" style="height: 900px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Orders</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($count=1)
                        @foreach($customers as $key => $customer)

                            <tr>
                                <td>{{$count}}</td>

                                <td>
                                    @if(isset($customer['firstname']))
                                        {{$customer['firstname'] .' '. $customer['lastname'] }}
                                    @endif
                                </td>

                                <td>
                                    @if(isset($customer['email'])){{$customer['email']}}@endif</td>
                                <td>
                                    @if(isset($customer['mobile'])){{$customer['mobile']}}@endif</td>
                                <td>
                                    @if(array_key_exists('Orders',$customer))
                                        {{count($customer['Orders'])}}
                                    @else
                                        0
                                    @endif
                                </td>

                                <td>
                                    @if(isset($customer['username']))

                                        <a href="viewcustomer/{{$customer['username']}}">
                                            <button class="btn btn-primary">View</button>
                                        </a>
                                    @endif
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
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
@stop
