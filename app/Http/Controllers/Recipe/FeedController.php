<?php

namespace App\Http\Controllers\Recipe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedController extends Controller
{
    //

    public function index()
    {
        return view('home');
    }
}
