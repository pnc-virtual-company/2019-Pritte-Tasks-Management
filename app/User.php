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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'email_verified_at', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * Returns the list of roles of a user
     *
     * @return array
     */
    public function roles()
    {
      return $this->belongsTo(Role::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot('tag');
    }
    
    public function individualTasks() {
        return $this->belongsToMany(IndividualTask::class);
    }

    public function individual()
    {
        return $this->belongsToMany(IndividualTask::class);
    }
}