<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>

<body>

    <div class="container p-3">
        <h2 class="text-center pb-3">Edit saber number: {{$comic->id}}</h2>
        <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Insert title" value="{{$comic->title}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpprice" placeholder="Insert description" value="{{$comic->description}}">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">series</label>
                <input type="text" class="form-control" name="series" id="series" aria-describedby="helpprice" placeholder="" value="{{$comic->series}}">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">sale_date</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" aria-describedby="helpprice" placeholder="" value="{{$comic->sale_date}}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" aria-describedby="helpprice" placeholder="" value="{{$comic->price}}">
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">artists</label>
                <input type="text" class="form-control" name="artists" id="artists" aria-describedby="helpprice" placeholder="" value="{{$comic->artists}}">
            </div>
            <div class="mb-3">
                <label for="writers" class="form-label">writers</label>
                <input type="text" class="form-control" name="writers" id="writers" aria-describedby="helpprice" placeholder="" value="{{$comic->writers}}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <input type="text" class="form-control" name="type" id="type" aria-describedby="helpprice" placeholder="" value="{{$comic->type}}">
            </div>
            <div class="d-flex gap-4 mb-4">
                <img src="{{ asset('storage/' . $comic->thumb) }}" alt="">
                <div class="mb-3">
                    <label for="thumb" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Choose file" aria-describedby="fileHelpThumb">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>