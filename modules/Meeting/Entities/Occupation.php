<?php namespace Modules\Meeting\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model {

    protected $fillable = [
        'name',
    ];


    /**
     * Relationship between occupations and users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }


    /**
     * Relationship between occupations and posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('Modules\Meeting\Entities\Post')->withTimestamps();
    }
}