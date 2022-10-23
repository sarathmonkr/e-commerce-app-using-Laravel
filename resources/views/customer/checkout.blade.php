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
        <div class="col-6">
            <form action="{{ url('home/addaddress') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <h2>Enter details</h2>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Phone Number</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>

    </div>

</div>

@endsection
