@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div>
        <button class="btn btn-primary" onclick="window.location='{{ url("admin/orders") }}'">Orders</button>
    </div>
    <div class="container vh-100  p-0 rounded row">

        @foreach($products as $item)
        <div class="col-2 p-3">
            <div class="card" onclick="window.location='{{ url("admin/view/$item->id") }}'">
                <div>
                    <img src=" {{asset('uploads/products/'.$item->img)}}" style="width" class="w-100 img-fluid">
                </div>
                <div class="text-center">
                    <h4 class="text-shadow">{{$item->name}}</h4>
                    <p>Price:{{$item->price}}</p>
                    <p>Status:<span class={{$item->status=='0' ? 'text-warning' : 'text-success' }}>
                            {{$item->status=='0' ? 'Not Approved' : 'Approved' }}
                        </span></p>
                    <div class="btn-group">
                        <a class="btn btn-transparent m-1" href="{{ url('admin/delete',$item->id)}}">Delete</a>
                        @if($item->status =='0')
                        <a class="btn btn-transparent m-1" href="{{ url('admin/approve',$item->id)}}">Approve</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
