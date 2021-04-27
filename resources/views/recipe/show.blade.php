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


@endsection

    