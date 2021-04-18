@extends('layouts.app')

@section('title','Recipe')

@section('content')

    <h1>Recipe</h1>

    @foreach($recipes as $recipe)

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ $recipe->cooking_time }}</p>
            </div>
        </div>


    @endforeach




@endsection


