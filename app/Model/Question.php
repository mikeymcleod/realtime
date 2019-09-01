<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    //This will change the reference of the route to Slug, not question ID.
    public function getRouteKeyName(){
        return 'slug';
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //This is to return the URL path

    public function getPathAttribute(){
        return asset("api/question/$this->slug");
    }

    
}

