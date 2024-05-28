<?php

namespace App\Models;

use App\Support\Address;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Change defulte table name from "users" to "user" 
     */
    protected $table = 'user';
    static public $tableName = 'user';
    protected $primaryKey = 'UserID';
    public $incrementing = false; // You most probably want this too

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

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
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'address' => 'array',
    // ];
    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => new Address($value),
        );
    }

    public function phone() {
        return $this->hasMany(Phone::class, 'UserID');
    }
}
