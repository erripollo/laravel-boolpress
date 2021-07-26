<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'summary', 'body'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
