<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = \App\Recipe::with('ingredients')->get();
        return view('recipe.index',compact('recipes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe->validate([
            'title' => 'required|max:200',
            'cooking_time' => 'required'|'integer'|'between:1,500',
            'name' => 'required'|'max:20',
            'amount' => 'required'|'interger'|'between:1,1000',
            'description' => 'required'|'max:1000'
        ]);

        $recipe = new Recipe();
        $recipe->title = request('title');
        $recipe->cooking_time = request('cooling_time');
        $recipe->save();

        $ingredient = new Ingredient();
        $ingredient->ingredient_id = request('ingredient');
        $ingredient->recipe_id = Auth::recipe('id');
        $ingredient->name = request('name');
        $ingredient->amount = request('amount');
        $ingredient->save();

        $cooking_step = new Cooking_step();
        $cooking_step->cooking_step_id = request('cooking_step_id');
        $cooking_step->recipe_id = Auth::recipe('id');
        $cooking_step->step_num = request('step_num');
        $cooking_step->description = request('description');
        $cooking_step->save();

        return redirect()->route('recipe.show',['id => $recipe->id']);
        // return response()->json($recipes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipe.show',compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
