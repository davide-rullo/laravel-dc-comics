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
    <div class="container py-3">
        <h1 class="text-center mb-4">Comics List</h1>


        <table class="table p-5">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comics as $comic)
                <tr class="text-center">
                    <td>{{ $comic->id }}</td>
                    <td>{{ $comic->title }}</td>

                    <td>
                        <a class="btn" href="{{ route('comics.show', $comic->id) }}">More</a>
                        <a class="btn btn-warning" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>
                </tr>
                @empty
                <h6>No comics uploaded yet!</h6>
                @endforelse
            </tbody>
        </table>



    </div>
</body>

</html>