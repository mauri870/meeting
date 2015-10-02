<?php namespace Modules\Meeting\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'published',
        'tags',
        'image',
    ];

    /**
     * Relationship between posts and user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relationship Between posts and occupations
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function occupations()
    {
        return $this->belongsToMany('Modules\Meeting\Entities\Occupation')->withTimestamps();
    }
}