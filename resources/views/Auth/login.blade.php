@extends('index')
@section('title' , 'login')
@section('content')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Log in</h4>
                    </div>
                    <form method="post" action="{{route('auth.check')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">

                            <div class="col-md-12"><label class="labels">Email :</label><input type="text" name="email" class="form-control" placeholder="Enter your email"></div>
                            @error('email') <small class="form-text text-danger">{{$message}}</small> @enderror


                            <div class="col-md-12"><label class="labels">Password :</label><input type="password" name="password" class="form-control" placeholder="Enter your passsword"></div>
                            @error('password') <small class="form-text text-danger">{{$message}}</small> @enderror


                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">login</button></div>
                        <div class="row mt-3">
                            <div class="container" style="background-color:#f1f1f1">
                                <span class="psw"><a href="{{route('auth.forget')}}">Forget password?</a></span>
                                <br>
                                <span ><a href="{{route('auth.register')}}">Register</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
