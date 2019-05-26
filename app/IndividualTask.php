<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualTask extends Model
{
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function groups() {
        return $this->belongsToMany(Group::class);
    }
}
