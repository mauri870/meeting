<?php namespace Modules\Meeting\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model {

    protected $fillable = [
        ''=>'',
    ];

    /**
     * Relationship between meetings and users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responsible()
    {
        return $this->belongsTo('App\User');
    }
}