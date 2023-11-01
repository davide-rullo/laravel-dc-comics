<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <!-- Styles -->
    @vite('resources/js/app.js')
</head>

<body>
    <div class="card">

        <div class="card-body">
            <h3 class="text-center">Comic #{{ $comic->id }}</h3>
            <h3 class="text-center">Comic #{{ $comic->title }}</h3>
            <h3 class="text-center">Comic #{{ $comic->description }}</h3>
            <h3 class="text-center">Comic #{{ $comic->price }}</h3>

        </div>
    </div>

</body>

</html>