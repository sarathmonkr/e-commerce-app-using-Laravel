@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div>
        <button class="btn btn-primary" onclick="window.location='{{ url("employee/add") }}'">Add Product</button>
    </div>
    <div class="container vh-100  p-0 rounded row">

        @foreach($products as $item)
        <div class="col-2 p-3">
            <div class="card" onclick="window.location='{{ url("employee/view/$item->id") }}'">
                <div>
                    <img src="{{asset('uploads/products/'.$item->img)}}" style="width" class="w-100 img-fluid">
                </div>
                <div class="text-center">
                    <h4 class="text-shadow">{{$item->name}}</h4>
                    <p>Price:{{$item->price}}</p>
                    <p>Status:<span class={{$item->status=='0' ? 'text-warning' : 'text-success' }}>
                            {{$item->status=='0' ? 'Not Approved' : 'Approved' }}
                        </span></p>
                    <a class="btn btn-transparent m-1" href="{{ url('employee/edit',$item->id)}}">Edit</a>
                    <a class="btn btn-transparent m-1" href="{{ url('employee/delete',$item->id)}}">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
