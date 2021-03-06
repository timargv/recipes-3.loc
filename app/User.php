<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    public const ROLE_USER = 'user';
    public const ROLE_MODERATOR = 'moderator';
    public const ROLE_ADMIN = 'admin';

    protected $fillable = [
        'name', 'last_name', 'first_name', 'email', 'password', 'role'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function rolesList(): array
    {
        return [
            self::ROLE_USER => 'User',
            self::ROLE_MODERATOR => 'Moderator',
            self::ROLE_ADMIN => 'Admin',
        ];
    }

    // Все Картинки рецепта
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'user_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'recipe_id', 'id');
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function uploadAvatar($image)
    {
        if($image == null) { return; }
        $this->removeAvatar();

        $filename  =  auth()->id() . '_'. str_random(10) . '.' . $image->extension();

        $path = 'public/uploads/users/'. auth()->id() .'/original/' ;
        $path_th = 'public/uploads/users/'. auth()->id() .'/thumbnail/' ;

        $image->storeAs($path, $filename);
        $image->storeAs($path_th, 'thumbnail_'. $filename);

        $this->avatar = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if($this->avatar != null)
        {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

    public function getImageThumbnail($userId)
    {
        $user = User::where('id', '=', $userId)->firstOrFail();

        if($user->avatar == null)
        {
            return '/storage/uploads/users/no-avatar.png';
        }
        $url = 'storage/uploads/users/'. $userId .'/original/';
        $path = $url . $user->avatar;

        return $path;

    }

    public function getAvatar(){
        if ($this->avatar) {
            $url = 'storage/uploads/users/'. $this->id .'/original/';
            $path = $url . $this->avatar;
            return $path;
        } return 'https://via.placeholder.com/400/999999/FFFFFF/';
    }

    public function getReciperCountAttribute(){
        return $this->recipes->count();
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

}
