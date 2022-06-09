<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
     protected $table = 'posts';

    // protected $guarded = [''];
    protected $fillable = ['title', 'content', 'slug', 'category_id', 'cover'];

    public static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $alternativeSlug = $slug;
        $postFound = Post::where("slug", $slug)->first();
        $counter = 1;
        while ($postFound) {
            $alternativeSlug = $slug . "_" . $counter;
            $counter++;
            $postFound = Post::where("slug", $alternativeSlug)->first();
        }
        return $alternativeSlug;
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
