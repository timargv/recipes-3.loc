<?php

namespace App\Http\Controllers\Admin\Recipes;

use App\Category;
use App\Ingredient;
use App\Measure;
use App\Recipe;
use App\RecipeAmountIngredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::with('category', 'comments.author', 'comments.replies.author', 'author')->paginate(10);
        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($recipe)
    {
        $categories = Category::defaultOrder()->withDepth()->get();
        $recipe = Recipe::where('id', $recipe)->with('category', 'author', 'amounts.ingredient', 'amounts.measure')->firstOrFail();

        $ingredients = Ingredient::paginate(50);
        $measures = Measure::all();

//        $images = $recipe->images()->orderByDesc('created_at')->get();



        return view('admin.recipes.edit', compact('recipe', 'categories', 'ingredients', 'measures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $recipe)
    {
        //

        $recipe = Recipe::findOrFail($recipe);
        $category = Category::findOrFail($recipe->category_id);


        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);

        $recipe->category()->associate($category);

        $recipe->update([
            'title'             => $request['title'],
            'text'              => $request['text'],
            'portion'           => $request['portion'],
            'hour'              => $request['hour'],
            'minutes'           => $request['minutes'],
            'calorie'           => $request['calorie'],
            'squirrels'         => $request['squirrels'],
            'fats'              => $request['fats'],
            'carbohydrates'     => $request['carbohydrates'],
            'status'            => $request['status'],
            'confirmed_recipe'  => $request['confirmed_recipe'],

            'category_id'       => $category->id,

        ]);

        if($recipe->update())
        {

            for ($i=0; $i < count($request['amount']); ++$i)
            {

                $amount_id = $request['amount_id'][$i];

                $amount = RecipeAmountIngredient::find($amount_id);

                if ($amount) {
                    $amount->update([
                        'amount'        =>  $request['amount'][$i],
                        'recipe_id'     =>  $recipe->id,
                        'ingredient_id' =>  $request['ingredient_id'][$i],
                        'measure_id'    =>  $request['measure_id'][$i],
                    ]);
                } else {
                    $amount = new RecipeAmountIngredient();
                    $amount->create([
                        'amount'        =>  $request['amount'][$i],
                        'recipe_id'     =>  $recipe->id,
                        'ingredient_id' =>  $request['ingredient_id'][$i],
                        'measure_id'    =>  $request['measure_id'][$i],
                    ]);
                    $amount->save();
                }

            }



            return redirect()->back()->with('info', 'Рецепт успешно обнавлен.');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
