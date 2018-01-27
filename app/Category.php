<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the category's project.
     *
     * @return Task Collection
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    /**
     * Get the category's tasks.
     *
     * @return Task Collection
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
