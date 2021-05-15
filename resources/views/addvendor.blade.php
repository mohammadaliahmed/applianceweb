@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vendor </h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <br>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{ route('savenewvendor') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf


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
                                        <label>Phone</label>
                                        <input type="number" class="form-control" required
                                               name="phone"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required
                                               name="email"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Username</label>

                                        <input type="text" class="form-control" required

                                               name="username"

                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password</label>

                                        <input type="text" class="form-control" required

                                               name="password"

                                               placeholder="Type Here">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" required
                                               name="city"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Cnic</label>
                                        <input type="number" class="form-control" required
                                               name="cnic"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Office Phone</label>
                                        <input type="number" class="form-control" required

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
                                                  placeholder="Type Here"> </textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Home address</label>
                                        <textarea type="text" class="form-control"

                                                  name="homeAddress"
                                                  placeholder="Type Here"> </textarea>
                                    </div>
                                </div>
                                <label>Commission percent</label>

                                <input type="number" class="form-control" required

                                       name="commission"
                                       placeholder="Type Here">

                            </div>
                            <div class="row justify-content-md-center   mt-5">
                                <button class="btn btn-success justify-content-md-center" type="submit">Save</button>

                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>

            </div>

        </div>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop