<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the task's category.
     *
     * @return Task Collection
     */
    public function category()
    {
        return $this->belongTo('App\Category');
    }

    /**
     * Get the task's tags.
     *
     * @return Task Collection
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
