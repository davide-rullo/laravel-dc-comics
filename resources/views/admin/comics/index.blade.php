@extends('layouts.app')

@section('content')
<div class="container py-3">

    @if(session('message'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('message')}}
    </div>

    <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert)
        })
    </script>


    @endif
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




                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#modalId-{{$comic->id}}">
                        Delete
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId-{{$comic->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$comic->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId-{{$comic->id}}">modalTitleId-{{$comic->id}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    La seguente modifica eliminerà il prodotto selezionato. Vuoi procedere ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Conferma</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>








                </td>
            </tr>
            @empty
            <h6>No comics uploaded yet!</h6>
            @endforelse
        </tbody>
    </table>



</div>
@stop