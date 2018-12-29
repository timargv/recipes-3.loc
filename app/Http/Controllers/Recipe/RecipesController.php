<?php

namespace App\Http\Controllers\Recipe;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);

        $recipe = Recipe::create([
            'title' => $request['title'],
            'portion' => $request['portion'],
            'hour' => $request['hour'],
            'minutes' => $request['minutes'],
            'calorie' => $request['calorie'],
            'squirrels' => $request['squirrels'],
            'fats' => $request['fats'],
            'carbohydrates' => $request['carbohydrates'],
            'status' => 'active',
            'confirmed_recipe' => 'yeas',
            'user_id' => Auth::id(),
        ]);


        return redirect()->route('recipe.show', $recipe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $comments = $recipe->comments()
            ->with('author', 'replies.author')
            ->orderByDesc('created_at')->paginate(5);
        $ingredients = $recipe->amounts()
            ->with('ingredient', 'recipe', 'measure')->orderByDesc('created_at')->get();
        $images = $recipe->images()->orderByDesc('created_at')->get();

        return view('recipes.show', compact('recipe', 'comments', 'ingredients', 'images'));
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
