@extends('index')
@section('title' , 'Success')
@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-4 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="alert alert-success" role="alert">
                        Element is charged, wish you good day with us.
                    </div>
                </div>
                <p class="text-center"><a href="{{route('home')}}" id="checkout-button" class="btn btn-success">Continue</a></p>
            </div>
        </div>
    </div>
</div>


@endsection
