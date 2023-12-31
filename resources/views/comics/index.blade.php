@extends('layouts.app')

@section('content')

<body>
    <header>
        <nav class="nav justify-content-center  ">
            <a class="nav-link p-4" href="#" aria-current="page">
                <h3>DC Comics</h3>
            </a>

        </nav>
    </header>
    <div class="container">
        <div class="row row-cols-3 g-4">
            @forelse ($comics as $comic)
            <div class="col">
                <div class="card h-100">

                    @if (str_contains($comic->thumb, 'http'))
                    <img class="card-img-top" style="width: 100;" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                    @else
                    <img class="card-img-top" style="width: 100;" src="{{ asset('storage/' . $comic->thumb) }}">
                    @endif



                    <div class="card-body">
                        <h4>{{$comic->title}}</h4>
                        <h5>{{$comic->price}}€</h5>
                        <h5>{{$comic->series}}</h5>
                        <h5>{{$comic->type}}</h5>
                    </div>
                </div>
            </div>
            @empty
            <h1>Niente</h1>
            @endforelse
        </div>
    </div>


</body>

</html>
@stop