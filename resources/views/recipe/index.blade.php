@extends('layouts.app')

@section('title','Recipe')

@section('content')

    <h1>Recipe</h1>

    @foreach($recipes as $recipe)

        <div class="card">
            <a href="{{ url('/ingredints') }}" class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ $recipe->cooking_time }}分</p>
                <p class="card-title">{{ $recipe->amount}}</p>
            </a>
        </div>


    @endforeach




@endsection


