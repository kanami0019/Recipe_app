@extends('layouts.app')

@section('title','Recipe')

@section('content')

 <div class='d-flex justify-content-between'>
    <h1>Recipe</h1>
    <a href="/recipes/create">投稿</a>
 </div>

    <div class="d-flex inline align-items-center  justify-content-center">
        <form action="cgi-bin/example.cgi" method="post">
            <input type="search" name="search" placeholder="料理の検索">
            <input type="submit" name="submit" value="検索">
        </form>
    </div>

    @foreach($recipes as $recipe)

        <div class="card">
            <a href="/recipes/{{ $recipe->id }}" class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ $recipe->cooking_time }}分</p>

    
            </a>
        </div>


    @endforeach




@endsection


