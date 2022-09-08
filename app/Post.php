<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
    
    // Esempio di relazione con nome colonna FK scritta a mano (un altro modo rispetto a quello di sopra)
    // public function category() {
    //     return $this->belongsTo('App\Category', 'category_id');
    // }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
