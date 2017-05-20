<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Intervention\Image\ImageManagerStatic;

class User extends Authenticatable
{
    use Notifiable;

   // protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmation_token', 'firstname', 'lastname', 'avatar', 'pro', 'description', 'siret', 'role', 'validate', 'phone', 'show_phone'
    ];
    public function annonces(){
        return $this->hasMany('App\Annonces');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot() {
        parent::boot();

        static::addGlobalScope('confirmed', function (Builder $builder) {
            $builder->where('confirmed', '=', true);
        });

    }

    public function getAvatarAttribute($avatar){
        if($avatar){
            return "/img/avatars/{$this->id}.jpg";
        }
        return false;
    }

    public function setAvatarAttribute($avatar){
    if(is_object($avatar) && $avatar->isValid()){
        ImageManagerStatic::make($avatar)->fit(150,150)->save(public_path(). "/img/avatars/{$this->id}.jpg");
        $this->attributes['avatar'] = true;
    }
    }
}
