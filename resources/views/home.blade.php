@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="container vh-100  p-0 rounded row">
        <div>
            <button class="btn btn-danger" onclick="window.location='{{ url("/home/cart") }}'">Cart</button>
        </div>
        @foreach($products as $item)
        @if($item->status == '1')
        <div class="col-2 p-3">
            <div class="card" onclick="window.location='{{ url("home/view/$item->id") }}'">
                <div>
                    <img src="{{asset('uploads/products/'.$item->img)}}" class="w-100 img-fluid">
                </div>
                <div class="text-center">
                    <h4 class="text-shadow">{{$item->name}}</h4>
                    <p>Price:{{$item->price}}</p>
                    <a class="btn btn-danger mb-2" href="{{ url('home/addcart',$item->id)}}">Add to cart</a>

                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</div>
@endsection