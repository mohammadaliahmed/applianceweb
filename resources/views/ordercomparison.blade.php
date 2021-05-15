@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Order Comparison</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">

            <!-- /.card -->
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="inner">
                            <h3> Lahore</h3>

                        </div>

                    </div>
                    <div class="card-body">
                        <div id="chartserviceslahore" style="height: 300px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="inner">
                            <h3> Islamabad</h3>

                        </div>

                    </div>
                    <div class="card-body">
                        <div id="chartservicesislamabad" style="height: 300px;"></div>

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
        const chartserviceslahore = new Chartisan({
            el: '#chartserviceslahore',
            url: "@chart('services_chart')" + "?city=Lahore",
            hooks: new ChartisanHooks()
                .colors(['#ecdd00'])
                .responsive()
                .beginAtZero()
                .legend({position: 'bottom'})
                .title('Orders in 2021')
                .datasets([{type: 'bar', fill: false}, 'bar']),

        });
        const chartservicesislamabad = new Chartisan({
            el: '#chartservicesislamabad',
            url: "@chart('services_chart')" + "?city=Islamabad",
            hooks: new ChartisanHooks()
                .colors(['#0199ec'])
                .responsive()
                .beginAtZero()
                .legend({position: 'bottom'})
                .title('Orders in 2021')
                .datasets([{type: 'bar', fill: false}, 'bar']),

        });

    </script>
@stop