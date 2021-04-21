@extends('layouts.app')

@section('title','Recipe')

@section('content')

    <a href="/recipes/create">投稿</a>

    <h1>Recipe</h1>
    <div style="display:inline-flex">
        <form class="form-inline my-2 my-lg-0 ">
        <input class="form-control mr-sm-2" type="search" placeholder="料理の検索" aria-label="料理の検索">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
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


