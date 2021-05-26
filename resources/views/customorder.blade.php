@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 xmlns:wire="http://www.w3.org/1999/xhtml">Add Custom Order</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Customer Details </h3>
                        <br>



                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form role="form" action="{{ route('createcustomorder') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <h1>Step 1</h1>
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required
                                               name="name"
                                               placeholder="Type Here">

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" required
                                               name="phone"

                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" required
                                               name="address"

                                               placeholder="Type Here">
                                    </div>
                                </div>
                                {{--<div class="col-sm-3">--}}
                                {{--Building Type:--}}
                                {{--<br>--}}
                                {{--<input type="radio" name="buildingType" value="Residential">--}}
                                {{--<label for="male">Residential</label><br>--}}
                                {{--<input type="radio" name="buildingType" value="Commercial">--}}
                                {{--<label for="female">Commercial</label><br>--}}
                                {{--<input type="radio" name="buildingType" value="Villa">--}}
                                {{--<label for="other">Villa</label>--}}
                                {{--</div>--}}

                            </div>
                            <br>
                            <hr>
                            Choose Service
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-6  border-right">
                                    <h1>Step 2</h1>
                                    <hr>
                                    @foreach($services as $service)

                                        <input class="m-5" type="radio" name="serviceName" id="toggle"
                                               value="{{$service['name']}} ">
                                        <img src="{{$service['imageUrl']}}" width="150"/>
                                        {{--                                        <label for="ServiceName">{{$service['name']}}</label><br>--}}
                                    @endforeach
                                </div>
                                <div class="col-6">
                                    <h1>Step 3</h1>
                                    <hr>
                                    <div id="loadingimg" class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="row">


                                        <div class="col-lg-4" id="subservices">
                                        </div>


                                    </div>

                                </div>


                            </div>
                            <hr>
                            <h1>Step 4</h1>

                            Select Date <input autocomplete="off" class="date  form-control" name="date" type="text" required>
                            <br>
                            Enter Time <input class="form-control" name="time" type="text" required>


                            <div class="d-flex m-5 justify-content-center">
                                <button class="btn btn-success col-2" type="submit">Save</button>


                            </div>

                        </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'dd-MM-yyyy'
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#loadingimg').hide();
            $('input[type=radio][name=serviceName]').change(function () {
                $('#loadingimg').show();
                var $data = $('#subservices');
                $data.empty();

                var vvvv = this.value;
                console.log(vvvv);
                $.ajax({
                    type: 'POST',
                    url: '{{url('/getsubservices/')}}',
                    data: {
                        'serviceName': vvvv,
                        '_token': '{{csrf_token()}}'

                    },
                    success: function (data) {

                        $data.empty();

                        data.forEach(function (item) {

                            // create an unordered list node
//                            var $ul = $('<ul>' + item['name'] + '</ul>');
                            var $ul = $('<input type="checkbox" id="subsearvices" value="' + item['name'] + '" name="subservice[]"/><label for="ServiceName"> ' + item['name'] + '</label><br>');

                            $data.append($ul);

                        });
                        $('#loadingimg').hide();
                        // append list node to parent node


                    }
                })
            });

        });

    </script>

@stop