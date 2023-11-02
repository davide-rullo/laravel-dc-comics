@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col">
            <div class="card d-flex align-items-center">
                @if (str_contains($comic->thumb, 'http'))
                <img class="card-img-top" style="width: 300px;" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                @else
                <img class="card-img-top" style="width: 300px;" src="{{ asset('storage/' . $comic->thumb) }}">
                @endif
                <div class="card-body">
                    <h4>{{$comic->title}}</h4>
                    <h5>{{$comic->price}}€</h5>
                    <h5>{{$comic->series}}</h5>
                    <h5>{{$comic->type}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@stop