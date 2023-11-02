@extends('layouts.app')

@section('content')
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

                @if (str_contains($comic->thumb, 'http'))
                <td><img style="width:50px" src="{{ $comic->thumb }}" alt="{{ $comic->title }}"></td>
                @else
                <td><img style="width:50px" src="{{ asset('storage/' . $comic->thumb) }}"></td>
                @endif

                <td>{{ $comic->id }}</td>
                <td>{{ $comic->title }}</td>

                <td>
                    <a class="btn btn-primary" href="{{ route('comics.show', $comic->id) }}">More</a>
                    <a class="btn btn-warning" href="{{route('comics.edit', $comic->id)}}">Edit</a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
            @empty
            <h6>No comics uploaded yet!</h6>
            @endforelse
        </tbody>
    </table>



</div>
@stop