@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
        <div class="row">
            <div class="col-6">
                <div id="chart" style="height: 300px;"></div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
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
    <script>
        <!-- Your application script -->
        var year = <?php echo $year; ?>;
        var user = <?php echo $user; ?>;
        var barChartData = {
            labels: year,
            datasets: [{
                label: 'User',
                backgroundColor: "pink",
                data: user
            }]
        };

        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Yearly User Joined'
                }
            }
        });

    </script>
@stop