<?php

namespace Witooh\Cms\Models;

use Eloquent;

class Content extends Eloquent {
    protected $table = 'cms_content';

    protected $fillable = array('title', 'content', 'published');

    protected $guarded = array('id');
}