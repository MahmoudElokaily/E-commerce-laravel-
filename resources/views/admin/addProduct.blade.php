@extends('index')
@section('title' , 'add product')
@section('content')


<h3>Add New Product</h3>

<div>
    <form action="{{route('admin.storeProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nameP">Name of product</label>
        <input type="text" id="nameP" name="name" placeholder="Name of product..">
        <br>

        <label for="des">Description</label>
        <input type="text" id="des" name="des" placeholder="Your Description..">
        <br>

        <label for="price">Price</label>
        <input type="text" id="price" name="price" placeholder="Your Price..">
        <br>

        <label for="image">Image</label>
        <input type="file" id="image" name="image">
        <br>


        <label for="category">Category</label>
        <select id="category" name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>

@endsection
