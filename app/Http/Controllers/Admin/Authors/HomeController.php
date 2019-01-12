<?php

namespace App\Http\Controllers\Admin\Authors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.authors.index');
    }
}
