<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the project's categories.
     *
     * @return Category Collection
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * get all the project's tasks.
     *
     * @return Task Collection
     */
    public function tasks()
    {
        return $this->hasManyThrough('App\Task', 'App\Category');
    }
}
