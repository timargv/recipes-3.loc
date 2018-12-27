<?php

namespace App\Http\Controllers\User;

use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function feed()
    {
        return view('user.profile.feed');
    }


    public function show(User $user) {

        $recipes = $user->recipes()->paginate(5);

        if ($user == Auth::user()) {
            $user = Auth::user();
        } else {
            $user = new User();
        }

        return view('user.show', compact('user', 'recipes'));
    }


}
