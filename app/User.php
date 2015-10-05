<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Parsidev\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, EntrustUserTrait {
        EntrustUserTrait::can as may;
        Authorizable::can insteadof EntrustUserTrait;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'occupation',
        'password',
        'occupation_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * Get the occupations from users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function occupation()
    {
        return $this->belongsTo('Modules\Meeting\Entities\Occupation');
    }

    /**
     * Get the roles from users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Relationship between user and posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('Modules\Meeting\Entities\Post');
    }

    /**
     * Relationship between users and meetings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetings()
    {
        return $this->hasMany('Modules\Meeting\Entities\Meeting');
    }
}
