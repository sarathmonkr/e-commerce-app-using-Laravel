@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div>
        <button class="btn btn-primary" onclick="window.location='{{ url("admin/dashboard") }}'">Dashboard</button>
    </div>
    <div class="container  p-0 rounded row">

        <div class="container px-5">
            <table class="table border border-5 mt-4">
                <thead class="text-danger">
                    <th>Customer name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Delivery Status</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($cdata as $item)
                    <tr>
                        <th>{{$item->name}}</th>
                        <th>{{$item->address}}</th>
                        <th>{{$item->phone}}</th>
                        <th>{{$item->product_names}}</th>
                        <th>{{$item->totalprice}}</th>
                        <th>{{$item->delivery_status}}</th>
                        <th>
                            @if($item->delivery_status=='Ordered')
                            <a class=" btn btn-danger"
                                onclick="window.location='{{ url("admin/delivered/$item->id") }}'">Set as
                                Delivered</a>
                            @endif
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection