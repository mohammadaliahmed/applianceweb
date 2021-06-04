@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="m-6 d-flex justify-content-end">

            <a href="customorder/">
                <button  type="button" class="m-2 btn btn-outline-info">Add Custom Order</button>

            </a>
        </div>

        <div class="row">
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$orderCount}}</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$invoices}}</h3>

                        <p>Invoices</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="invoices" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$userCount}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="customers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$serviceCount}}</h3>

                        <p>Services</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="serviceslist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->

            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{$serviceMen}}</h3>

                        <p>ServiceMen</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-user-secret"></i>
                    </div>
                    <a href="servicemen" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>1</h3>

                        <p>Accounts</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-user-secret"></i>
                    </div>
                    <a href="accounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="inner">
                            <h3> Rs {{$totalRevenue}}</h3>

                            <p>Total Revenue</p>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="chartorders" style="height: 300px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="inner">
                            <h3> {{$orderCount}}</h3>

                            <p>Total Orders</p>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="chartservices" style="height: 300px;"></div>

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

    <!-- Charting library -->
    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chartorders',
            url: "@chart('sample_chart')" + "?year=2021",
            hooks: new ChartisanHooks()
                .colors(['#ec0109'])
                .responsive()
                .beginAtZero()
                .legend({position: 'bottom'})
                .title('Orders in 2021')
                .datasets([{type: 'line', fill: false}, 'line']),

        });
        const chartservices = new Chartisan({
            el: '#chartservices',
            url: "@chart('services_order_chart')" + "?year=2021",
            hooks: new ChartisanHooks()
                .colors(['#BE6693'])
                .responsive()
                .beginAtZero()
                .legend({position: 'bottom'})
                .title('Orders in 2021')
                .datasets([{type: 'bar', fill: false}, 'bar']),

        });
    </script>
@stop