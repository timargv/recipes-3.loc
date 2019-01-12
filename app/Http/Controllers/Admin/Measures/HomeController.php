<?php

namespace App\Http\Controllers\Admin\Measures;

use App\Measure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $measures = Measure::orderByDesc('created_at')->paginate(50);
        return view('admin.measures.index', compact('measures'));
    }


    public function create()
    {
        return view('admin.measures.create');
    }


    //=================================
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);

        $measure = Measure::create([
            'title' => $request['title'],
        ]);
        return redirect()->route('admin.measures.show', $measure);
    }


    //=================================
    public function show(Measure $measure)
    {
//        $products = Recipe::where('measure_id', $measure->id)->paginate(15);
        return view('admin.measures.show', compact('measure'));
    }


    //=================================
    public function edit(Measure $measure)
    {
        return view('admin.measures.edit', compact('measure', 'parents'));
    }


    //=================================
    public function update(Request $request, Measure $measure)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);

        $measure->update([
            'title'         => $request['title'],
        ]);
        return redirect()->route('admin.measures.show', $measure);
    }


    //=================================
    public function destroy(Measure $measure)
    {
        $measure->delete();
        return redirect()->route('admin.measures.index');
    }
}
