<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ingredient;
use App\CookingStep;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = \App\Recipe::with(['ingredients','cooking_steps'])->get();
        $recipes = \App\Recipe::inRandomOrder()->get();
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
        $request->validate([
            'title' => 'required|max:200',
            'cooking_time' => 'required|integer|between:1,500',
            'name' => 'required|max:20',
            'amount' => 'required|integer|between:1,1000',
            'description' => 'required|max:1000'
        ]);

        $recipe = new Recipe();
        $recipe->user_id = Auth::id();
        $recipe->title = request('title');
        $recipe->cooking_time = request('cooking_time');
        $recipe->save();

        $ingredient = new Ingredient();
        $ingredient->recipe_id = $recipe->id;
        $ingredient->name = request('name');
        $ingredient->amount = request('amount');
        $ingredient->save();

        $cooking_step = new CookingStep();
        $cooking_step->recipe_id = $recipe->id;
        $cooking_step->step_num = request('step_num');
        $cooking_step->description = request('description');
        $cooking_step->save();

        return redirect()->route('recipe.show',['id => $recipe->id']);
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
        return view('recipe.edit', compact('recipe')); 
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
        $request->validate([
            'title' => 'required|max:200',
            'cooking_time' => 'required|integer|between:1,500',
            'name' => 'required|max:20',
            'amount' => 'required|integer|between:1,1000',
            'description' => 'required|max:1000'
        ]);

        $recipe = new Recipe();
        $recipe->user_id = Auth::id();
        $recipe->title = request('title');
        $recipe->cooking_time = request('cooking_time');
        $recipe->save();

        $ingredient = new Ingredient();
        $ingredient->recipe_id = $recipe->id;
        $ingredient->name = request('name');
        $ingredient->amount = request('amount');
        $ingredient->save();

        $cooking_step = new CookingStep();
        $cooking_step->recipe_id = $recipe->id;
        $cooking_step->step_num = request('step_num');
        $cooking_step->description = request('description');
        $cooking_step->save();

        return redirect()->route('recipe.postshow',['id => $recipe->id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipe.index');
    }


    public function serch(Request $request) 
    {

        return view('recipe.serch');
    }

    public function postindex(Recipe $recipe)
    {
        $user = Auth::user();
        $recipes = \App\Recipe::with(['ingredients','cooking_steps'])->get();
        return view('recipe.postindex',compact('recipes'));

    }

}