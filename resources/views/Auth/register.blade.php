@extends('index')
@section('content')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Register</h4>
                    </div>
                    <form method="post" action="{{route('auth.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">

                            <div class="col-md-12"><label class="labels">Name :</label><input type="text" name="name" class="form-control" placeholder="Enter your name"></div>
                            @error('name') <small class="form-text text-danger">{{$message}}</small> @enderror


                            <div class="col-md-12"><label class="labels">Email :</label><input type="text" name="email" class="form-control" placeholder="Enter your email"></div>
                            @error('email') <small class="form-text text-danger">{{$message}}</small> @enderror

                            <div class="col-md-12"><label class="labels">Password :</label><input type="password" name="password" class="form-control" placeholder="Enter your password"></div>
                            @error('password') <small class="form-text text-danger">{{$message}}</small> @enderror

                            <div class="col-md-12"><label class="labels">Confirm password :</label><input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control"></div>


                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Register</button></div>
                        <div class="container signin">
                            <p>Already have an account? <a href="{{route('auth.login')}}">Sign in</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
