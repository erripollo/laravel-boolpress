<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'summary', 'body', 'category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function incrementReadCount()
    {
        $this->reads++;
        return $this->save();
    }
    
}
