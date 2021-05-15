@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


@stop

@section('content')
    {{--order details--}}
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> mrappliance
                            <small class="float-right">Date: {{date("d-M-Y ", $invoice['time']/1000)}}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>mrappliance</strong><br>
                            {{--795 Folsom Ave, Suite 600<br>--}}
                            {{--San Francisco, CA 94107<br>--}}
                            {{--Phone: (804) 123-5432<br>--}}
                            {{--Email: info@almasaeedstudio.com--}}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong>{{$invoice['order']['user']['firstname'].' '.$invoice['order']['user']['lastname']}}</strong><br>
                            {{$invoice['order']['user']['googleAddress']}}<br>
                            Phone: {{$invoice['order']['user']['mobile']}}<br>
                            Email: {{$invoice['order']['user']['email']}}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice #{{$invoice['invoiceId']}}</b><br>
                        <br>
                        <b>Order ID:</b> {{$invoice['order']['orderId']}}<br>
                        <b>Service Type:</b> {{$invoice['order']['serviceName']}}<br>
                        <b>Building Type:</b> {{$invoice['order']['buildingType']}}<br>

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
                                <th>Quantity</th>

                            </tr>
                            </thead>
                            <tbody>

                            @php($count=1)
                            @foreach($invoice['order']['countModelArrayList'] as $item)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$item['service']['name']}}</td>
                                    <td>{{$item['quantity']}}</td>

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
                    <!-- accepted payments column -->
                    <div class="col-6">

                    </div>
                    <!-- /.col -->
                    <div class="col-6">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th style="width:50%">Total Time:</th>
                                    <td>{{$invoice['order']['totalHours']}} hours</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>{{$invoice['order']['totalHours']}}x{{$invoice['order']['serviceCharges']}}</td>
                                </tr>
                                <tr>
                                    <th>Material Bill:</th>
                                    <td>{{$invoice['order']['materialBill']}}</td>
                                </tr>
                                <tr>
                                    <th>10% mat. bill:</th>
                                    <td>Rs {{$invoice['order']['materialBill']/10}}</td>
                                </tr>

                                <tr>
                                    <th>Total</th>
                                    <td>{{$invoice['order']['totalPrice']}}</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <button onclick="window.print()" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</button>
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
