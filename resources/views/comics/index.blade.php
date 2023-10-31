<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Styles -->
    @vite('resources/js/app.js')
</head>

<body>
    <div class="container">
        <div class="row row-cols-3 g-4">
            @forelse ($comics as $comic)
            <div class="col">
                <div class="card h-100">
                    <img src="{{$comic->thumb}}" class="card-img-top" width="100" alt="">
                    <div class="card-body">
                        <h4>{{$comic->title}}</h4>
                        <p>{{$comic->description}} </p>
                        <p>{{$comic->price}}</p>
                        <p>{{$comic->series}}</p>
                        <p>{{$comic->title}}</p>
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