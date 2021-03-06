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
        'display_name', 'username', 'password', 'avatar', 'affiliation'
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

    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function hints() {
        return $this->hasMany(HintRequest::class);
    }

    public function isAdmin() {
        return $this->role === 'ADMIN';
    }
}
