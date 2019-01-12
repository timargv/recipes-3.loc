<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->paginate(50);
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.categories.create', compact('parents'));
    }


    //=================================
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:product_categories,id',
        ]);

        $category = Category::create([
            'title'         => $request['title'],
            'description'   => $request['description'],
            'status'        => $request['status'],
            'image'         => $request['image'],
            'icon'          => $request['icon'],
            'parent_id'     => $request['parent'],
        ]);
        return redirect()->route('admin.categories.show', $category);
    }


    //=================================
    public function show(Category $category)
    {
        $categories = Category::where('parent_id', $category->id)->defaultOrder()->get();
//        $products = Recipe::where('category_id', $category->id)->paginate(15);
        return view('admin.categories.show', compact('category', 'categories'));
    }


    //=================================
    public function edit(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.categories.edit', compact('category', 'parents'));
    }


    //=================================
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:product_categories,id',
        ]);

        $category->update([
            'title'         => $request['title'],
            'description'   => $request['description'],
            'status'        => $request['status'],
            'image'         => $request['image'],
            'icon'          => $request['icon'],
            'parent_id'     => $request['parent'],
        ]);
        return redirect()->route('admin.categories.show', $category);
    }


    //=================================
    public function first(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }
        return redirect()->back();
    }


    //=================================
    public function up(Category $category)
    {
        $category->up();
        return redirect()->back();
    }


    //=================================
    public function down(Category $category)
    {
        $category->down();
        return redirect()->back();
    }


    //=================================
    public function last(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }
        return redirect()->back();
    }


    //=================================
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
