@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Accounts</h1>
@stop

@section('content')
    <div class="container-fluid">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Expenses</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body  table-bordered table-responsive p-0" style="height: 900px;width:100%">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Staff</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expenses as  $expense)

                        <tr>
                            <td>{{$expense['title']}}</td>
                            <td>{{$expense['description']}}</td>
                            <td>{{$expense['price']}}</td>
                            <td>{{$expense['status']}}</td>
                            <td>{{$expense['staffMember']}}</td>
                            <td>{{$expense['category']}}</td>
                            <td>{{$expense['date']}}</td>

                            <td>
                                <a href="rejectexpense/{{$expense['id']}}">
                                    <button class="btn btn-danger">Reject</button>
                                </a> <a href="approveexpense/{{$expense['id']}}">
                                    <button class="btn btn-success">Approve</button>
                                </a>
                            </td>


                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop