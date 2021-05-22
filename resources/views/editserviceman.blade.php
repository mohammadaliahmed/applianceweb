@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Serviceman</h1>
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit serviceman</h3>
                        <br>


                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form role="form" action="{{ route('saveserviceman') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            {{--<div class="d-flex justify-content-center">--}}
                            {{--<div class="file-upload-wrapper"><input type="file" id="file" name="logo"--}}
                            {{--value="logo.png"--}}
                            {{--accept="image/x-png"--}}

                            {{-->--}}
                            {{--<input--}}
                            {{--hidden--}}
                            {{--type="text" class="file-upload-input" value="logo.png">--}}

                            {{--</div>--}}
                            {{--<br><br>--}}

                            {{--</div>--}}

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required
                                               name="name"
                                               value="{{$serviceman['name']}}"
                                               required
                                               placeholder="Type Here">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" required

                                               value="{{$serviceman['username']}}"
                                               disabled
                                               placeholder="Type Here"> <input type="text" class="form-control" required
                                                                               name="username"
                                                                               value="{{$serviceman['username']}}"
                                                                               hidden
                                                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" required
                                               name="password"
                                               value="{{$serviceman['password']}}"
                                               placeholder="Type Here">
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" class="form-control" required
                                               name="mobile"
                                               value="{{$serviceman['mobile']}}"

                                               placeholder="Type Here">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Age</label>
                                    <input type="number" class="form-control"
                                           name="age"
                                           value="{{$serviceman['age']}}"
                                           required
                                           placeholder="Type Here">
                                </div>
                                <div class="col-sm-3">
                                    <label>EID</label>
                                    <input type="number" class="form-control"
                                           name="eid"
                                           required
                                           value="{{$serviceman['eid']}}"
                                           placeholder="Type Here">
                                </div>
                                <div class="col-sm-3">
                                    <label>Role</label>
                                    <input type="text" class="form-control"
                                           name="role"
                                           required
                                           value="{{$serviceman['role']}}"
                                           placeholder="Type Here">
                                </div>

                            </div>
                            {{--<p>Please select your gender:</p>--}}
                            {{--<input type="radio" id="male" name="gender" value="male">--}}
                            {{--<label for="male">Male</label><br>--}}
                            {{--<input type="radio" id="female" name="gender" value="female">--}}
                            {{--<label for="female">Female</label><br>--}}
                            {{--<input type="radio" id="other" name="gender" value="other">--}}
                            {{--<label for="other">Other</label>--}}
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