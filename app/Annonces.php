<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Database\Eloquent\Builder;
use Jenssegers\Date\Date;

// use App\Behaviour\Sluggable;
class Annonces extends Model
{

    public $guarded = ['id'];

    public $date = ['created_at', 'updated_at'];


    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('validated', function (Builder $builder) {
            $builder->where('annonces.validate', '=', true);
            $date = Date::now()->addDays(-60);
            $builder->where('annonces.updated_at', '>', $date);
        });

        static::deleted(function($instance){
            if($instance->avatar){
               unlink(public_path() .$instance->avatar);
            }
            return true;
        });
    }

    public function categories(){
        return $this->belongsTo('App\Categories');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getExpirationTimeAttribute(){
        $dateCreation = Date::instance(new \DateTime($this->attributes['updated_at']));
        $dateExpiration = $dateCreation->addDays(60);
        // return $dateExpiration;

        return $dateExpiration->diffForHumans();
    }

    public function getAvatarMiniAttribute(){

        if($this->avatar){
            return "/img/annonces/small/". ceil($this->id / 50) . "/{$this->id}.jpg";
        }
        return false;
    }

    public function getAvatarAttribute($avatar){
        if($avatar){
            return "/img/annonces/". ceil($this->id / 50) . "/{$this->id}.jpg";

        }
        return false;
    }


    public function getIsExpiredAdsAttribute() {
        $dateCreation = Date::instance(new \DateTime($this->attributes['updated_at']));
        $dateExpiration = $dateCreation->addDays(60);

        return $dateExpiration < Date::now();
    }

    public function setAvatarAttribute($avatar){
        if(is_object($avatar) && $avatar->isValid()){
            self::saved(function($instance) use ($avatar){

                $dir = public_path(). "/img/annonces/". ceil($instance->id /50 );
                if(!file_exists($dir)){
                    mkdir($dir);
                }
                ImageManagerStatic::configure(array('driver' => 'imagick'));
                ImageManagerStatic::make($avatar)->save("$dir/{$instance->id}.jpg");


                $small = public_path(). "/img/annonces/small/". ceil($instance->id /50 );
                if(!file_exists($small)){
                    mkdir($small, 0777, true);
                }
                ImageManagerStatic::make($avatar)->fit(300,300)->save("$small/{$instance->id}.jpg");
            });
            $this->attributes['avatar'] = true;

        }
    }

    public function scopeSearchByKeyword($query, $keyword, $cat, $pro = null)
{

    if ($keyword!='' && $cat!='') {
        $query->where("name", "LIKE","%$keyword%")
            ->where("categories_id", "LIKE", "%$cat%");
    }else{
        $query->where("categories_id", "LIKE", "%$cat%");
    }
    $query->select('annonces.*');
    if(!is_null($pro) && $pro == 1){

        $query->join('users', 'user_id', '=', 'users.id')
            ->where('users.pro','=' , 1);


    }

    if(!is_null($pro) && $pro == 0){
        $query->join('users', 'user_id', '=', 'users.id')->where('users.pro','=' , 0);

    }
  /*  if($pro == 3){
        $query->join('users', 'user_id', '=', 'users.id');

    }*/

    return $query;
}


}
