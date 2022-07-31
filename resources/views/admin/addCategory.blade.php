@extends('index')
@section('title' , 'add category')
@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Add New category</h4>
                </div>
                <form method="post" action="{{route('admin.storeCategory')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">

                        <div class="col-md-12"><label class="labels">Name of product :</label><input type="text" name="name" class="form-control" placeholder="Name of category"></div>
                        @error('name') <small class="form-text text-danger">{{$message}}</small> @enderror


                        <div class="col-md-12"><label class="labels">Image :</label><input type="file" name="image" class="form-control"></div>
                        @error('image') <small class="form-text text-danger">{{$message}}</small> @enderror

                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Category</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection
