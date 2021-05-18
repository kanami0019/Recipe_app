@extends('layouts.app')

@section('title','Recipe')

@section('content')

 <div class='d-flex justify-content-between'>
    <h1>Recipe</h1>
    <a href="/recipes/create">投稿</a>
 </div>


        <div class="container">
            <div class="d-flex inline align-items-center  justify-content-center">
                <div class="col-md-6">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <form action="/recipes/search" method="POST">
                                {{ csrf_field() }}
                                <input type="search" name="search" class="form-control input-lg" placeholder="料理名.レシピで検索">
                                <span class="input-group-btn"style="position: relative; top: -36px; left: 193px;">
                                    <button class="btn btn-info btn-lg" name="submit" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                @isset($search)
                
                <h5 class ="card-title">{{ $search }}の検索結果{{ $recipes->count() }}件</h5>

                @endisset

    @foreach($recipes as $recipe)

        <div class="card d-flex justify-content-start">
            <a href="/recipes/{{ $recipe->id }}" class="card-body">

            <div class="d-flex justify-content-start">
                <div class="image d-flex justify-content-start">
                    @if($recipe->image)
                        <img src= "{{asset('images/'.$recipe->image)}}" width="170px" height="170px">
            
                    @endif 
                </div>

                <div style="padding: 20px;">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                    <p class="card-text">{{ $recipe->cooking_time }}分</p>
                </div>
            </div>
            </a>
        </div>

    @endforeach
@endsection