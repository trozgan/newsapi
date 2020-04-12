<?php

namespace Trozgan\NewsApi\Facades;

use Illuminate\Support\Facades\Facade;

class NewsApi extends Facade {
  protected static function getFacadeAccessor(){
    return 'newsapi';
  }
}
