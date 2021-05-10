@extends('layouts.app')

@section('title','Recipe')

@section('content')

 <div class='d-flex justify-content-between'>
    <h1>Recipe</h1>
    <a href="/recipes/create">投稿</a>
 </div>

    <div class="d-flex inline align-items-center  justify-content-center">
        <form action="/recipes/search" method="POST">
        {{ csrf_field() }}
            <input type="search" name="search" placeholder="料理の検索">
            <input type="submit" name="submit" value="検索">
    </div>

        @isset($search_result )
            <h5 class ="card-title">{{ $search_result }}</h5>
            
        @endisset
 
    @foreach($recipes as $recipe)

        <div class="card">
            <a href="/recipes/{{ $recipe->id }}" class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ $recipe->cooking_time }}分</p>
    
            </a>
        </div>

    @endforeach




@endsection


