<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'full_name',
        'login',
        'password',
        'about_me',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function performing_tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'performer_id', 'id');
    }

    public function created_tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'creator_id', 'id');
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($item) => mb_convert_case($item, MB_CASE_TITLE, "UTF-8"),
        );
    }

    public function login(): Attribute
    {
        return Attribute::make(
            get: fn ($item) => mb_convert_case($item,  MB_CASE_TITLE, "UTF-8"),
        );
    }


}
