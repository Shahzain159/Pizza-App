@extends('User.layout')

@section('title', 'Login')

@section('content')
    <div class="container">
        <h3>Login Page</h3>
        @if(Session::has('success'))
        <div class="alert alert-success" id="success_message">
            {{ Session::get('success') }}
        </div>
    @endif

        @guest
        <div class="row w-50 justify-content-center">
            <form method="post" action="{{ route('loginpost') }}">
                @csrf

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                  @if ($errors->has('email'))
                  <div class="text-danger">{{ $errors->first('email') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  @if ($errors->has('password'))
                  <div class="text-danger">{{ $errors->first('password') }}</div>
                  @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        @else
            <h2>User Already Login</h2>
        @endguest


    </div>


@endsection
