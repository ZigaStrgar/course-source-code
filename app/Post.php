<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('published_desc', function(Builder $builder) {
            $builder->orderBy('published', 'DESC');
        });
    }

    use SoftDeletes;

    protected $fillable = [ 'title', 'content', 'description', 'slug', 'category_id' ];

    protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
