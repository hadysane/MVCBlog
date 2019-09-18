<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'lastname','birthdate', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //  User hasMany billets
    public function billets() {
        return $this->hasMany(Billet::class);
    }

    // User hasMany comments
    public function comments() {
        return $this->hasMany(Comment::class); 
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    // Any roles
    public function hasAnyRoles($roles) {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    // single role
    public function hasAnyRole($role) {
        return null !== $this->roles()->where('name', $role)->first();
    }
    
}
