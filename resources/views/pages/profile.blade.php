@extends('index')
@section('title' , 'My Profile')
@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('images/users/'.Auth::user()->photo) ?? "https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"}}"><span class="font-weight-bold">{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" action="{{route('updateUser' , Auth::user()->id)}}" enctype="multipart/form-data">
                    @csrf
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="Name" value="{{Auth::user()->name}}"></div>
                    <div class="col-md-6"><label class="labels">Nickname</label><input type="text" name="nickname" class="form-control" value="{{Auth::user()->nickname ?? "NickName"}}" placeholder="Nickname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phone" class="form-control" placeholder="enter phone number" value="{{Auth::user()->phone ?? "Phone"}}"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" placeholder="enter address" value="{{Auth::user()->address ?? "Address"}}"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" name="postcode" class="form-control" placeholder="Postcode" value="{{Auth::user()->postcode ?? "Postcode"}}"></div>
                    <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" name="area" placeholder="Enter your area" value="{{Auth::user()->area ?? "Area"}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" name="country" placeholder="country" value="{{Auth::user()->country ?? "Country"}}"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="state" value="{{Auth::user()->state ?? "State"}}" placeholder="Your state"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Image</label><input type="file" name="image" class="form-control" placeholder="Image"`></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
