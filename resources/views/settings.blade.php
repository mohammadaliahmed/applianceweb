@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Settings</h1>
@stop

@section('content')
    <div class="container-fluid">

        <form role="form" action="{{ route('savesterms') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <label>Terms and conditions</label>
                                <textarea type="text" class="form-control" required
                                          rows="10"
                                          name="termsAndConditions"
                                          placeholder="Type Here"> </textarea>
                            </div>


                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <label>Privacy Policy</label>
                                <textarea type="text" class="form-control" required
                                          rows="10"
                                          name="privacyPolicy"
                                          placeholder="Type Here"> </textarea>
                            </div>


                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div> <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <label>Rate List</label>
                                <textarea type="text" class="form-control" required
                                          rows="10"
                                          name="rateList"
                                          placeholder="Type Here"> </textarea>
                            </div>


                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <div class="card">
                <div class="d-flex justify-content-center m-4">
                    <button class="btn btn-success col-2" type="submit">Save</button>
                </div>
            </div>
        </form>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop