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
            'description' => 'required|max:1000',
            'image' => 'file',
        ]);

        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

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
        $cooking_step->image = $fileName;
        $cooking_step->save();

        return redirect()->route('recipes.show',['id' => $recipe->id]);
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
            'description' => 'required|max:1000',
            'image' => 'file',
        ]);

        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
            
        } else {
            $fileName = "";

        }

        $recipe->user_id = Auth::id();
        $recipe->title = request('title');
        $recipe->cooking_time = request('cooking_time');
        $recipe->save();

        $ingredient = $recipe->ingredients[0];
        $ingredient->recipe_id = $recipe->id;
        $ingredient->name = request('name');
        $ingredient->amount = request('amount');
        $ingredient->save();

        $cooking_step = $recipe->cooking_steps[0];
        $cooking_step->recipe_id = $recipe->id;
        $cooking_step->step_num = request('step_num');
        $cooking_step->description = request('description');
        if($fileName){
            $cooking_step->image = $fileName;
        };
        $cooking_step->save();

        return redirect()->route('recipes.show',['id' => $recipe->id]);
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
        return redirect()->route('recipes.index');
    }


    public function search(Request $request) 
    {
        $recipes = Recipe::With(['ingredients'=> function($ingredient){
            $ingredient->where('name','like',"%{$request->search}%")
            ->orWhere('title','like',"%{$request->search}%");

        }])->get();

        // $recipes = Recipe::Where('title','like',"%{$request->search}%")->get();


        if($request->search){
            $search_result = $request->search.'の検索結果'.$recipes->count().'件';
    
            return view('recipe.index',compact('recipes','search_result'));
        }else{
            return view('recipe.index',compact('recipes'));
        }

    
    }

    

    public function postindex(Recipe $recipe)
    {
        $user = Auth::user();
        $recipes = \App\Recipe::with(['ingredients','cooking_steps'])->get();
        return view('recipe.postindex',compact('recipes'));

    }

}