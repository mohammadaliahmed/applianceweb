@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Service</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add service </h3>
                        <br>


                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form role="form" action="{{ route('saveservice') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <div class="file-upload-wrapper"><input type="file" id="file" name="logo"
                                                                        value="logo.png"
                                                                        accept="image/x-png"

                                    >
                                    <input
                                            hidden
                                            type="text" class="file-upload-input" value="logo.png">

                                </div>
                                <br><br>

                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required
                                               name="name"
                                               placeholder="Type Here">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="number" class="form-control" required
                                               name="position"

                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br>
                                    <input type="checkbox"
                                           name="offeringCommercialService">Offering Residential service


                                    <br>
                                    <input type="checkbox"
                                           name="offeringResidentialService">Offering Commercial service
                                    <br>
                                    <input type="checkbox"
                                           name="offeringVillaService">
                                    Offering Villa service
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Base Price</label>
                                        <input type="number" class="form-control" required
                                               name="serviceBasePrice"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Peak Price</label>
                                        <input type="number" class="form-control"
                                               name="peakPrice"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Commercial service Peak Price</label>
                                    <input type="number" class="form-control"
                                           name="commercialServicePeakPrice"
                                           placeholder="Type Here">
                                </div>
                                <div class="col-sm-3">
                                    <label>Commercial service Price</label>
                                    <input type="number" class="form-control"
                                           name="commercialServicePrice"
                                           placeholder="Type Here">
                                </div>

                            </div>
                            <div class="row">
                                <label>Description</label>
                                <textarea type="text" class="form-control" required

                                          name="description"
                                          placeholder="Type Here"> </textarea>
                            </div>
                            <br>
                            <br>
                            <div class="d-flex justify-content-center">
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
@stop