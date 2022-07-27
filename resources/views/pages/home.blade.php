@extends('index')
@section('title' , 'Home')
@section('content')
 <!-- Banner -->
     @if(isset($products) && count($products)  >= 3)
     <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
         <ol class="carousel-indicators">
             <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
             <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
             <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
             <div class="carousel-item active">
                 <div class="container">
                     <div class="row p-5">
                         <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                             <img class="img-fluid" src="{{asset('images/products/'.$products[0]->image)}}" alt="">
                         </div>
                         <div class="col-lg-6 mb-0 d-flex align-items-center">
                             <div class="text-align-left align-self-center">
                                 <h1 class="h1">{{$products[0]->category->name}}</h1>
                                 <h3 class="h2">{{$products[0]->name}}</h3>
                                 <p>{{$products[0]->description}}</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="carousel-item">
                 <div class="container">
                     <div class="row p-5">
                         <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                             <img class="img-fluid" src="{{asset('images/products/'.$products[1]->image)}}" alt="">
                         </div>
                         <div class="col-lg-6 mb-0 d-flex align-items-center">
                             <div class="text-align-left">
                                 <h1 class="h1">{{$products[1]->category->name}}</h1>
                                 <h3 class="h2">{{$products[1]->name}}</h3>
                                 <p>{{$products[1]->description}}</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="carousel-item">
                 <div class="container">
                     <div class="row p-5">
                         <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                             <img class="img-fluid" src="{{asset('images/products/'.$products[2]->image)}}" alt="">
                         </div>
                         <div class="col-lg-6 mb-0 d-flex align-items-center">
                             <div class="text-align-left">
                                 <h1 class="h1">{{$products[2]->category->name}}</h1>
                                 <h3 class="h2">{{$products[2]->name}}</h3>
                                 <p>{{$products[2]->description}}</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
             <i class="fas fa-chevron-left"></i>
         </a>
         <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
             <i class="fas fa-chevron-right"></i>
         </a>
     </div>
     @endif
 <!-- End Banner -->


 <!-- Start Categories -->
 <section class="container py-5">
     <div class="row text-center pt-3">
         <div class="col-lg-6 m-auto">
             <h1 class="h1">Categories</h1>
             <p>
                 Everything that is new you will find
             </p>
         </div>
     </div>
     <div class="row">
         @foreach($categories as $category)
             <div class="col-12 col-md-4 p-5 mt-3">
                 <a href="{{route('category' , $category->id)}}"><img src="{{asset('images/categories/'.$category->image)}}" class="rounded-circle img-fluid border"></a>
                 <h5 href="{{route('category' , $category->id)}}" class="text-center mt-3 mb-3">{{$category->name}}</h5>
                 <p class="text-center"><a href="{{route('category' , $category->id)}}" class="btn btn-success">See More</a></p>
             </div>
         @endforeach
     </div>
 </section>
 <!-- End Categories  -->

 <!-- Start Lastest Product -->
 <section class="bg-light">
     <div class="container py-5">
         <div class="row text-center py-3">
             <div class="col-lg-6 m-auto">
                 <h1 class="h1">Lastest Product</h1>
                 <p>
                     Everything that is new you will find
                 </p>
             </div>
         </div>
         <div class="row">
             @foreach($lastestProducts as $lastProduct)
                 <div class="col-12 col-md-4 mb-4">
                     <div class="card h-100">
                         <a href="#">
                             <img href="{{route('category' , $lastProduct->category_id)}}" src="{{asset('images/products/'.$lastProduct->image)}}" class="card-img-top" alt="...">
                         </a>
                         <div class="card-body">

                             <a href="{{route('category' , $lastProduct->category_id)}}" class="h2 text-decoration-none text-dark">{{$lastProduct->name}}</a>
                             <p class="card-text">{{$lastProduct->description}}</p>
                             <p class="text-center"><a href="{{route('category' , $lastProduct->category_id)}}" class="btn btn-success">See More</a></p>

                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
 <!-- End Lastest Product -->

@endsection
