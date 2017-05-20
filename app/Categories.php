<?php

namespace App;

use App\Behaviour\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $fillable = ['name', 'slug'];

    use Sluggable;

    public function annoncesValider(){
        return $this->hasMany('App\Annonces')->where('validate', 1)->with('Categories');
    }
}
