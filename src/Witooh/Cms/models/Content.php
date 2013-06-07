<?php

namespace Witooh\Cms\Models;

use Eloquent;

class Content extends Eloquent {
    protected $table = 'cms_content';

    protected $fillable = array('title', 'content', 'published');

    protected $guarded = array('id');

    public function category(){
        return $this->belongsTo('Witooh\Cms\Models\Category', 'category_id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}