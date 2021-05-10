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
</div>

<!-- <div class="container">
	<div class="row">
        <div class="col-md-6">
    		<h2>Recipe検索</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="料理の検索" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div>
</div> -->

            @isset($search_result)
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


