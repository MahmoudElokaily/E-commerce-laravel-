@extends('index')
@section('title' , 'Categories')
@section('content')
    <div class="row">
        @foreach($categories as $category)
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">{{$category->name}}</h1>
                    <img src="{{asset('images/categories/'.$category->image)}}" class="rounded-circle img-fluid border">
                </div>
            </div>
        @endforeach
    </div>
@endsection
