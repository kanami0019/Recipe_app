@extends('layouts.app')

@section('title', 'Recipe')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $recipe->title }}</h5>
            <p class="card-text">{{ $recipe->cooking_time }}分</p>

    @foreach($recipe->ingredients as $ingredient)

        <h5 class="card-text">{{ $ingredient->name }}</h5>
        <h5 class="card-text">{{ $ingredient->amount }}</h5>

    @endforeach

    @foreach($recipe->cooking_steps as $cooking_step)

        <h5 class="card-text">{{ $cooking_step->step_num }}</h5>
        <h5 class="card-text">{{ $cooking_step->description }}</h5>

    @endforeach  

    <div class="d-flex" style="height: 36.4px;">
        <a href="/recipes/{{ $recipe->id }}/edit" class="btn btn-outline-primary">Edit</a>
            <form action="/recipes/{ $recipe->id }" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
    </div>


@endsection