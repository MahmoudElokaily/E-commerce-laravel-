@extends('index')
@section('title' , 'add category')
@section('content')

<h3>Add New Category</h3>

<div>
    <form action="{{route('admin.storeCategory')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nameC">Name of Category</label>
        <input type="text" id="nameC" name="name" placeholder="Name of Category..">
        <br>

        <label for="image">Image</label>
        <input type="file" id="image" name="image">
        <br>

        <input type="submit" value="Submit">
    </form>
</div>

@endsection
