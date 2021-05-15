@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cities</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ route('addcity') }}" method="POST"
                              enctype="multipart/form-data">
                        @csrf


                        <!-- textarea -->
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <label class="m-3">City Name</label>
                                    <input type="text" class="form-control col-4 m-3" required
                                           name="cityname"
                                           placeholder="Type Here">
                                    <br>
                                    <button class="btn btn-success m-3" type="submit">Save
                                    </button>
                                </div>


                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">

        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">List of Cities</h3>
            </div>
            <div class="card-body">

                <div class="row">

                    @foreach($cities as $key=>$city)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box ">
                                <div class="d-flex justify-content-end">
                                    <a href="deletecity/{{$key}}"><i
                                                class="far fa-times-circle align-content-end"></i></a>
                                </div>
                                <div class="inner">

                                    <h3>{{$key}}</h3>


                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="serviceslist/{{$key}}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>





                    @endforeach
                </div>

            </div>


            <!-- /.card-header -->

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop