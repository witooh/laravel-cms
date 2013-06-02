<?php

namespace Witooh\Cms\Facades;

use Illuminate\Support\Facades\Facade;

class ContentManager extends Facade {

    protected static function getFacadeAccessor(){ return 'cms.content'; }

}