@extends('layouts.app')

@section('title', 'Recipe')

@section('content')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $recipe->title }}</h5>
            <p class="card-text">{{ $recipe->cooking_time }}分</p>
            

@endsection