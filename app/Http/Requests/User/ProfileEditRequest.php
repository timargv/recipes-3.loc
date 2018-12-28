<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();
        return [
//            'name' => 'required|string|max:255|unique:users,id,' . $userss->id,
            'name' => [
                'required',
                'alpha_dash',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg'
        ];
    }
}
