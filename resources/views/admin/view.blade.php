@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 row">
    <!-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif -->

    <div class="col-md-2 vh-100  p-0 rounded">
        <div>
            <button class="btn btn-danger" onclick="window.location='{{ url("admin/dashboard") }}'">Dashboard</button>
        </div>
    </div>

    <div class="col-md-8 vh-100  p-0 rounded">

        @if(session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

        <div class="row container vh-100">
            <div class="col-12 col-sm-6  ">
                <img src="{{asset('uploads/products/'.$product->img)}}" alt="" class="img-fluid card">
            </div>
            <div class="col-12 col-sm-6">
                <h1 class="text-danger ">{{$product->name}}</h1>
                <h4 class="text-danger ">{{$product->brand}}</h4>
                <p>Price:{{$product->price}}/-</p>
                <p>Description:{{$product->description}}-</p>
                <p>Status:<span class={{$product->status=='0' ? 'text-warning' : 'text-success' }}>
                        {{$product->status=='0' ? 'Not Approved' : 'Approved' }}
                    </span></p>
                <a class="btn btn-danger m-1" href="{{ url('admin/delete',$product->id)}}">Delete</a>
                @if($product->status =='0')
                <a class="btn btn-danger m-1" href="{{ url('admin/approve',$product->id)}}">Approve</a>
                @endif
            </div>
        </div>


    </div>

</div>
























@endsection