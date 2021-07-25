<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; 


    // RelationShip To User Table
    public function user(){
        return $this -> belongsTo('App\Models\User');
    }


    // Category RelationShip
    public function categroies(){
        return $this -> belongsToMany('App\Models\Category');
    }


    // Tags RelationShip
    public function tags(){
        return $this -> belongsToMany('App\Models\Tag');
    }


}
