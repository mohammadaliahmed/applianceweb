@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit service {{$service['name']}} </h3>
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
                                    <br>
                                    <br>
                                    <img src="{{$service['imageUrl']}}" class="img-thumbnail" width="150">
                                    <br>


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
                                               value="{{$service['name']}}"
                                               placeholder="Type Here">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="number" class="form-control" required
                                               name="position"
                                               value="{{$service['position']}}"

                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <br>
                                    @if($service['offeringCommercialService'])
                                        Offering Residential service <input type="checkbox"
                                                                            checked
                                                                            name="offeringCommercialService">
                                    @else
                                        Offering Residential service <input type="checkbox"

                                                                            name="offeringCommercialService">
                                    @endif

                                    <br>

                                    @if($service['offeringResidentialService'])
                                        Offering Commercial service <input type="checkbox"
                                                                           checked
                                                                           name="offeringResidentialService">
                                    @else
                                        Offering Commercial service <input type="checkbox"

                                                                           name="offeringResidentialService">
                                    @endif
                                    <br>
                                    @if($service['offeringVillaService'])
                                        Offering Villa service <input type="checkbox"
                                                                           checked
                                                                           name="offeringVillaService">
                                    @else
                                        Offering Villa service <input type="checkbox"

                                                                           name="offeringVillaService">
                                    @endif

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
                                               value="{{$service['serviceBasePrice']}}"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Peak Price</label>
                                        <input type="number" class="form-control"
                                               name="peakPrice"
                                               value="{{$service['peakPrice']}}"
                                               placeholder="Type Here">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Commercial service Peak Price</label>
                                    <input type="number" class="form-control"
                                           name="commercialServicePeakPrice"
                                           value="{{$service['commercialServicePeakPrice']}}"
                                           placeholder="Type Here">
                                </div>
                                <div class="col-sm-3">
                                    <label>Commercial service Price</label>
                                    <input type="number" class="form-control"
                                           name="commercialServicePrice"
                                           value="{{$service['commercialServicePrice']}}"
                                           placeholder="Type Here">
                                </div>

                            </div>
                            <div class="row">
                                <label>Description</label>
                                <textarea type="text" class="form-control" required

                                          name="description"
                                          placeholder="Type Here"> {{$service['description']}}</textarea>
                            </div>
                            <br>
                            <br>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success col-2" type="submit">Update</button>


                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Subservices</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('addsubservice') }}" method="POST"
                              enctype="multipart/form-data">
                        @csrf


                        <!-- textarea -->
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <label class="m-3">Sub service name</label>
                                    <input type="text" class="form-control col-4 m-3" required
                                           name="name"
                                           placeholder="Type Here">

                                    <input type="text" class="form-control" required
                                           value="{{$service['name']}}"
                                           name="parentService"
                                           hidden
                                           placeholder="Type Here">
                                    <br>
                                    <button class="btn btn-success m-3" type="submit">Save
                                    </button>
                                </div>


                            </div>


                        </form>
                        <div class="row">
                            <div class="card-body  table-bordered table-responsive p-0" style="height: 300px;">

                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($subserviceslist>0)
                                        @php($count=1)
                                        @foreach($subserviceslist as  $subservice)
                                            @if($subservice['parentService']==$service['name'])

                                                <tr>
                                                    <td>{{$count}}</td>
                                                    <td>{{$subservice['name']}}</td>
                                                    <td>
                                                        <a class="px-2 "
                                                           href="../deletesubservice/{{$subservice['id']}}">
                                                            <button class="btn btn-danger">Delete
                                                            </button>
                                                        </a>

                                                    </td>


                                                </tr>
                                                @php($count++)
                                            @endif
                                        @endforeach


                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop