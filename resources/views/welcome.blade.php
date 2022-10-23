<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">



    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
</head>

<body>
    <!-- nav bar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Levi's</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex flex-end">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6  sm:block">
                    @auth
                    <a class="btn " href="{{ url('/home') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                    <a class="btn " href="{{ route('login') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                    <a class="btn " href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>
    <!-- nav bar end -->
    <div class="container pt-5">
        <div class="row ">
            @foreach($products as $item)
            @if($item->status == '1')
            <div class="col-3 p-3">
                <div class="card" onclick="window.location='{{ url("home/view/$item->id") }}'">
                    <div>
                        <img src="{{asset('uploads/products/'.$item->img)}}" class=" img-fluid">
                    </div>
                    <div class="text-center">
                        <h4 class="text-shadow">{{$item->name}}</h4>
                        <p>Price:{{$item->price}}</p>
                        <a class="btn btn-danger mb-2" href="{{ url('/login')}}">Add to cart</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>

</html>
















</html>