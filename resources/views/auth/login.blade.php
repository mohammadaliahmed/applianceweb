<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


<center>
    <div class="col-4">
        <div class="card mt-5">
            <form role="form" method="POST" action="{{ route('login') }}">
                {!! csrf_field() !!}
                <div class="card-header ">
                    <span class="card-title"> LOGIN TO YOUR ACCOUNT
                            </span>

                </div>
                <div class="card-body">

                    @if(count($errors->all()))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Alert!</strong> {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <div class="form-group">
                        <div class="form-group">
                            <label>Email</label>

                            <input id="email" type="text" class="form-control"
                                   placeholder=" email" name="email" value="{{ old('email') }}"
                                   autofocus>
                        </div>

                        <div class="form-group">
                            <label>Password</label>

                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN NOW</button>
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<a href="{{asset('/password/reset')}}">Forget Your Password . ?</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{url('contact')}}">Need Support .</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{asset('/register')}}">Sign up .</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </form>
        </div>

    </div>
</center>


<script type="javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>