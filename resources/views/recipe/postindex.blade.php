@extends('layouts.app')

@section('title','Recipe')

@section('content')

 <div class='d-flex justify-content-between'>
    <h1>投稿履歴</h1>
    <a href="/recipes/create">Back</a>
 </div>

    @foreach($recipes as $recipe)
        @if(Auth::user()->can('view', $recipe))

            <div class="card">
                <a href="/recipes/{{ $recipe->id }}" class="card-body">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                    <p class="card-text">{{ $recipe->cooking_time }}分</p>

    
                </a>
            </div>

        @endif
    @endforeach




@endsection