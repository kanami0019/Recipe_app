@extends('layouts.app')

@section('title', 'Recipe.app')

@section('content')



<h1>レシピ投稿</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="/recipes" enctype="multipart/form-data">
        {{ csrf_field() }}

        
        <div class="form-group">
         <label for="title">料理名</label>
          <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>

        <input type="file" name="recipe_image">

        <hr>

        <div class="form-group">
         <label for="cooking_time">料理時間</label>
        <div class="d-flex">
         <input id="cooking_time"type="text" class="form-control" name="cooking_time" value="{{old('cooking_time')}}">
         <h7>分</h7>
        </div>

        <div class="form-row">
         <div class="form-group col-sm-6">
          <label for="name">材料</label>
          <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
         </div>

         <div class="form-group col-sm-6">
          <label for="amount">量</label>
          <input id="amount" type="text" class="form-control" name="amount" value="{{old('amount')}}">
         </div>
        
        </div>

         <div class="form-group">
          <label for="description">作り方</label>
          <input id="step_num" type="hidden" name="step_num" value="9">
          <textarea id="description" class="form-control"  name="description"> {{old('description')}}</textarea>
         </div>

         <input type="file" name="image">
         
         <hr>

 

        <button type="submit" class="btn btn-outline-primary">投稿</button>
    </form>

    <a href="{{'/post'}}"  class="d-flex px-2 py-4">投稿履歴</a>

@endsection