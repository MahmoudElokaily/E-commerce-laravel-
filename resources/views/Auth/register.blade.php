@extends('index')
@section('content')
    <form action="{{route('auth.store')}}" method="post">
        @csrf
        @isset($success)
            <div class="alert alert-success">
                @if (Session::has('success'))
                    {{Session::get('success')}}
                @endif
            </div>
        @endisset
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="name"><b>Name : </b></label>
            <input id="name" type="text" placeholder="Enter your name" name="name" id="name">
            <br>

            <label for="email"><b>Email : </b></label>
            <input id="email" type="text" placeholder="Enter your Email" name="email">
            <br>

            <label for="psw"><b>Password : </b></label>
            <input id="psw" type="password" placeholder="Enter Password" name="password">
            <br>

            <label for="psw-repeat"><b>Confirm Password : </b></label>
            <input id="psw-repeat" type="password" placeholder="Confirm Password" name="password_confirmation">
            @isset($error)
            <div class="alert alert-danger">
                @if (Session::has('error'))
                    {{Session::get('error')}}
                @endif
            </div>
            @endisset
            <br>
            <hr>
            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="{{route('auth.login')}}">Sign in</a>.</p>
        </div>
    </form>
@endsection