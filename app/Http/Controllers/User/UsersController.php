<?php

namespace App\Http\Controllers\User;

use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\ProfileEditRequest;
use App\UseCases\Profile\ProfileService;

class UsersController extends Controller
{

    private $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    //
    public function feed()
    {
        return view('user.profile.feed');
    }


    public function show(User $user) {
        $recipes = $user->recipes()->with('comments.author', 'comments.replies.author', 'author')->paginate(5);
        return view('user.show', compact('user', 'recipes'));

    }


    // Редактирование профиля
    public function edit() {
        $title = 'Edit Profile';
        $user = Auth::user();
        return view('user.profile.edit', compact('user', 'title'));
    }



    // Обнавление пользователя
    public function update(ProfileEditRequest $request)
    {
        try {
            $this->service->edit(Auth::id(), $request);
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('user.edit');
    }


}
