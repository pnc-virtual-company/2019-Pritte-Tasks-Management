<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
    ];

    //
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('tag');
    }
    public function groups()
    {
        return $this->belongsToMany(IndividualTask::class);
    }
}