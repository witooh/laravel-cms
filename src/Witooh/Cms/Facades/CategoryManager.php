<?php

namespace Witooh\Cms\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryManager extends Facade {

    protected static function getFacadeAccessor(){ return 'cms.category'; }

}