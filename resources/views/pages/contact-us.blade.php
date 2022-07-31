@extends('index')
@section('title' , 'Contact-us')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    @if (Session::has('success'))
                        <div class="alert alert-danger">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Contact Us</h4>
                    </div>
                    <form method="post" action="{{route('send-mail-contact-us')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">

                            <div class="col-md-12"><label class="labels">Name :</label><input type="text" name="name" class="form-control" placeholder="Enter your name" required></div>

                            <div class="col-md-12"><label class="labels">Password :</label><textarea name="subject" class="form-control" placeholder="tell us what do you want" required></textarea></div>

                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Send</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
