<?php

namespace NewsApi\Facades;

use Illuminate\Support\Facades\Facade;

class NewsApi extends Facade {
  protected static function getFacadeAccessor(){
    return 'newsapi';
  }
}
