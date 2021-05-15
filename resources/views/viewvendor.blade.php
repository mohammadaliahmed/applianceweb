@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vendor {{$vendor['name']}}</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <br>
                        @if(isset($vendor['picUrl']))
                            <img src="{{$vendor['picUrl']}}" width="150" class="img-thumbnail">
                        @endif


                        <div class="card-tools">

                            @if($vendor['active'])
                                <a href="{{$id}}/inactive">
                                    <button class="btn btn-danger">Inactive</button>
                                </a>
                            @else
                                <a href="{{$id}}/active">
                                    <button class="btn btn-success">Activate</button>
                                </a>
                            @endif

                            @if($vendor['approved'])
                                <a href="{{$id}}/disapprove">
                                    <button class="btn btn-danger">Disapprove</button>
                                </a>
                            @else
                                <a href="{{$id}}/approve">
                                    <button class="btn btn-success">Approve</button>
                                </a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{ route('savevendor') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required value="{{$vendor['name'] }}"
                                               name="name"
                                               placeholder="Type Here">
                                        <input type="text" class="form-control" required
                                               value="{{$vendor['username'] }}"
                                               name="username"
                                               hidden
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" required value="{{$vendor['phone'] }}"
                                               name="phone"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required value="{{$vendor['email'] }}"
                                               name="email"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" required value="{{$vendor['city'] }}"
                                               name="city"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Cnic</label>
                                        <input type="number" class="form-control" required value="{{$vendor['cnic'] }}"
                                               name="cnic"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Office Phone</label>
                                        <input type="number" class="form-control" required
                                               value="{{$vendor['officePhone'] }}"
                                               name="officePhone"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Office Address</label>
                                        <textarea type="text" class="form-control" required

                                                  name="officeAddress"
                                                  placeholder="Type Here">{{$vendor['officeAddress'] }} </textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Home address</label>
                                        <textarea type="text" class="form-control"

                                                  name="homeAddress"
                                                  placeholder="Type Here">{{$vendor['homeAddress'] }} </textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-md-center ">
                                <button class="btn btn-success justify-content-md-center" type="submit">Save</button>

                            </div>
                        </form>
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
                        Commission setting
                    </div>
                    <div class="card-body">

                        <form role="form" action="{{ route('savecommision') }}" method="POST"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Commission percent</label>
                                @if(isset($vendor['commission']))
                                    <input type="number" class="form-control" required
                                           value="{{$vendor['commission'] }}"
                                           name="commission"
                                           placeholder="Type Here">
                                @else
                                    <input type="number" class="form-control" required

                                           name="commission"
                                           placeholder="Type Here">
                                @endif
                                <input type="text" class="form-control" required
                                       value="{{$vendor['username'] }}"
                                       name="username"
                                       hidden
                                       placeholder="Type Here">
                                <br>
                                <br>
                                <div class="row justify-content-md-center ">
                                    <button class="btn btn-success justify-content-md-center" type="submit">Save
                                    </button>

                                </div>
                            </div>

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Order details
                    </div>

                    <div class="card-body  table-bordered table-responsive p-0" style="height: 500px;">
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

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Monthly Order Chart
                    </div>
                    <div class="card-body">
                        <div id="chartorders" style="height: 500px;"></div>
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

    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chartorders',
            url: "@chart('vendor_orders_monthly_chart')" + "?vendor={{$vendor['username'] }}",
            hooks: new ChartisanHooks()
                .colors(['#ec0109'])
                .responsive()
                .beginAtZero()
                .legend({position: 'bottom'})
                .title('Orders')
                .datasets([{type: 'bar', fill: false}, 'bar']),

        });




        {{--$('input[name=toggle]').change(function () {--}}
        {{--var mode = $(this).prop('checked');--}}
        {{--var id = $(this).val();--}}
        {{----}}

        {{--var productObj = {};--}}
        {{--productObj.mode = $(this).prop('checked');--}}
        {{--productObj.comment_id = $(this).val();--}}
        {{--productObj._token = '{{csrf_token()}}';--}}

        {{--$.ajax({--}}
        {{--type: "POST",--}}
        {{--dataType: "JSON",--}}
        {{--url: "{{ url('/updateProductStatus') }}",--}}
        {{--data: productObj,--}}
        {{--success: function (data) {--}}
        {{--}--}}
        {{--});--}}
        {{--});--}}
    </script>
@stop