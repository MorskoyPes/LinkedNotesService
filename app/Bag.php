<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
