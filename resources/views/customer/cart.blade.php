@extends('layouts.app')

@section('content')
<?php $total = 0 ?>
<div class="container-fluid m-0 row">
    <!-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif -->

    <div class="col-md-2 p-0 rounded">
        <div>
            <button class="btn btn-danger" onclick="window.location='{{ url("/home") }}'">Dashboard</button>
        </div>
    </div>

    <div class="col-md-8 vh-100  p-0 rounded">

        @if(session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif


        @if(!session('cart'))
        <h1>No items added to cart</h1>
        @endif
        @if(session('cart'))
        <h1>Cart Items</h1>
        <div class="row p-0 flex-row container bg-warning card">
            @if(session('cart'))
            @foreach(session('cart') as $id=> $details)
            <?php $total += $details['price'] * $details['quantity']; ?>

            <div class="card m-0 d-flex col-6 bg-warning  card">
                <div class="p-3 row bg-light">
                    <div style="width: 100px;" col-6>
                        <img src="{{asset('uploads/products/'.$details['img'])}}" class="img-fluid">
                    </div>
                    <div class="text-center col-6">
                        <h4 class="text-shadow">{{$details['name']}}</h4>
                        <p>Price:{{$details['price']}}</p>
                        <p>Quantity:{{$details['quantity']}}</p>

                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <div class="d-flex justify-content-around p-2">
                <h4>Total:{{$total}}</h4>
                <button class="btn btn-danger" id="check"
                    onclick="window.location='{{ url("/home/checkout") }}'">Checkout
                    Now</button>
            </div>
        </div>
        @endif


    </div>
</div>






@endsection
