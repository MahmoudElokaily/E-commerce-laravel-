@extends('index')
@section('title' , 'Error')
@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-4 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="alert alert-danger" role="alert">
                            Sorry,This page for only admin.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
