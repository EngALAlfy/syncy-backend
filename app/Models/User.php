<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasImageTrait;
use App\Traits\HasLogsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasImageTrait;
    use HasRoles;
    use HasLogsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'state_id',
        'country_code',
        'phone_number',
        'image',
        'sex',
        'birthdate',
        'login_method',
        'email',
        'image',
        'password',
    ];

    protected $appends = [
        "image_url",
        "full_phone",
    ];

    public static array $rules = [
        'name' => "required|max:255|min:3",
        'email' => "required|email|max:255|unique:users,email",
        'image' => "nullable|image|max:500",
        'password' => "required|max:100|min:4",
    ];

    public static array $updateRules = [
        'name' => "required|max:255|min:3",
        'email' => "required|email|max:255|unique:users,email",
        'image' => "nullable|image|max:500",
        'password' => "nullable|max:100|min:4",
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function getFullPhoneAttribute(): string
    {
        return $this->country_code . $this->phone_number;
    }
}
