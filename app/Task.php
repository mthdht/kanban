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
     * Get the category's project.
     *
     * @return Task Collection
     */
    public function category()
    {
        return $this->belongTo('App\Category');
    }
}
