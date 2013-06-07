<?php

namespace Witooh\Cms\Models;

use Eloquent;

class Category extends Eloquent {
    protected $table = 'cms_category';

    protected $fillable = array('name');

    protected $guarded = array('id');

    public function content(){
        return $this->hasMany('Witooh\Cms\Models\Content', 'category_id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }
}