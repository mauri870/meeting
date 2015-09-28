<?php namespace Modules\Meeting\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model {

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}