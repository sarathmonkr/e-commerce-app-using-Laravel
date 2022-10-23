@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 row">
    <!-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif -->

    <div class="col-md-4 vh-100  p-0 rounded">
        <div>
            <button class="btn btn-primary"
                onclick="window.location='{{ url("employee/dashboard") }}'">Dashboard</button>
        </div>
    </div>

    <div class="col-md-8 vh-100  p-0 rounded">

        @if(session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

        <h1>Edit Products</h1>

        <div class="col-6">
            <form action="{{ url('employee/edit/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" value="{{$product->brand}}" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{$product->description}}" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{$product->price}}" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="img">Image</label>
                    <input type="file" name="img" class="form-control">
                    <img src="{{asset('uploads/products/'.$product->img)}}" width="250px" height="300px"
                        class="img-fluid">

                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection