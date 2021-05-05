@extends('layouts.app')

@section('title', 'Recipe')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="/recipes/{{ $recipe->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
         <label for="title">料理名</label>
          <input id="title" type="text" class="form-control" name="title" value="{{ old('title') == '' ? $recipe->title : old('title') }}">
        </div>

        <div class="form-group">
         <label for="cooking_time">料理時間</label>
        <div class="d-flex">
         <input id="cooking_time"type="text" class="form-control" name="cooking_time" value="{{ old('cooking_time') == '' ? $recipe->cooking_time : old('cooking_time') }}">
         <h7>分</h7>
        </div>

        @foreach($recipe->ingredients as $ingredient)

        <div class="form-row">
         <div class="form-group col-sm-6">
          <label for="name">材料</label>
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') == '' ? $ingredient->name : old('name') }}">
         </div>

         <div class="form-group col-sm-6">
          <label for="amount">量</label>
          <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') == '' ? $ingredient->amount : old('amount') }}">
         </div>
        </div>
        @endforeach

        <div class="form-group">
         <label for="description">作り方</label>
         <input id="step_num" type="hidden" name="step_num" value="9">

         @foreach($recipe->cooking_steps as $cooking_step)

         <textarea id="description" class="form-control"  name="description">{{ old('description') == '' ? $cooking_step->description : old('description') }}</textarea>
        </div>

        <form method="POST" action="/recipes" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
         </form> 
         <hr>

        @endforeach

<button type="submit" class="btn btn-outline-primary">編集</button>
    </form>

@endsection