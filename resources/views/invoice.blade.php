@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


@stop

@section('content')
    {{--order details--}}
    <div class="row">
        {{--        <a class="btn btn-primary" href="{{ URL::to('createPDF/'.$invoice['invoiceId']) }}">Export to PDF</a>--}}

        <div class="col-12">
            <!-- Default box -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <img width="200" src="{{asset("uploads/logo.jpg")}}">
                            <small class="float-right">Invoice #: {{$invoice['invoiceId']}}
                                <br>Date: {{date("d-M-Y ", $invoice['time']/1000)}}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->

                <br>

                <div class="row invoice-info">
                    <div class="col-12">
                        <div class="float-left">
                            From<br>
                            <strong>Mr. Appliance</strong><br>
                            Service Center #2, Albade building ahmeri,Dubai<br>
                            043700033, 0556363186<br>
                            https://mrappliance.com<br>
                            services@mrappliance.info<br>
                        </div>


                        <!-- /.col -->
                        <div class="float-right">
                            To
                            <br>
                            <strong>{{$invoice['user']['firstname'].' '.$invoice['user']['lastname']}}</strong><br>
                            @if(isset($invoice['user']['googleAddress']))
                                {{$invoice['user']['googleAddress']}}<br>
                            @else
                                {{$invoice['user']['address']}}<br>
                            @endif
                            Phone: @if(isset($invoice['user']["mobile"]))
                                {{$invoice['user']["mobile"]}}
                            @else  {{$invoice['user']["phone"]}}
                            @endif
                            <br>
                            Email: {{$invoice['user']['email']}}

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sr #</th>
                                <th>Service name</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Amount</th>

                            </tr>
                            </thead>
                            <tbody>

                            @php($count=1)

                            @foreach ($invoice['invoiceItems'] as $key => $value) {
                            <tr>
                                <td>{{$count}}</td>
                                <td style="width: 900px;">{{$value['description']}}</td>
                                <td>{{$value['price']}}</td>
                                <td>{{$value['quantity']}}</td>
                                <td>{{$value['price']*$value['quantity']}}</td>

                            </tr>
                            @php($count++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">

                    <div class="col-3">

                    </div>
                    <div class="col-3">

                    </div>
                    <div class="col-3">

                    </div>
                    <div class="col-3">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th style="width:50%">Total</th>
                                    <td>{{$invoice["total"]}}</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <button onclick="window.print()" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print
                        </button>
                        {{--<button class="btn btn-default" onclick="window.print()">Print this page</button>--}}


                    </div>
                </div>
            </div>

        </div>
        {{--order details end--}}

        {{--user details--}}

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
