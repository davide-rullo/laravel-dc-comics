@extends('layouts.app')

@section('content')

<body>


    <div class="container p-3">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif



        <h2 class="text-center pb-3">Add a Comic</h2>
        <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle" placeholder="Insert title" value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpprice" placeholder="Insert description">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">series</label>
                <input type="text" class="form-control" name="series" id="series" aria-describedby="helpprice" placeholder="">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">sale_date</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" aria-describedby="helpprice" placeholder="">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" aria-describedby="helpprice" placeholder="">
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">artists</label>
                <input type="text" class="form-control" name="artists" id="artists" aria-describedby="helpprice" placeholder="">
            </div>
            <div class="mb-3">
                <label for="writers" class="form-label">writers</label>
                <input type="text" class="form-control" name="writers" id="writers" aria-describedby="helpprice" placeholder="">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <input type="text" class="form-control" name="type" id="type" aria-describedby="helpprice" placeholder="">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Choose file" aria-describedby="fileHelpThumb">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

@stop