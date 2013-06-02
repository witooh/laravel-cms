<?php

namespace Witooh\Cms\Models;

use Eloquent;

class Category extends Eloquent {
    protected $table = 'cms_category';

    protected $fillable = array('name');

    protected $guarded = array('id');
}