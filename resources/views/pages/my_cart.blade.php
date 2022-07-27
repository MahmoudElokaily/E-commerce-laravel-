@extends('index')
@section('title' , 'My Cart')
@section('content')

    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">My Cart</h1>
{{--                <img src="{{asset('images/categories/'.$category->image)}}" class="rounded-circle img-fluid border">--}}
            </div>
        </div>
        <div class="row">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="col-12 col-md-4 p-5 mt-3">
                        <a href="#"><img src="{{asset('images/products/'.$product->image)}}" class="rounded-circle img-fluid border"></a>
                        <h5 class="text-center mt-3 mb-3">{{$product->name}}</h5>
                        <p>{{$product->description}}</p>
                        <p class="text-center"><a class="btn btn-success">Buy it Now</a></p>
                        <p class="text-center"><a class="btn btn-success">Add to cart</a></p>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
