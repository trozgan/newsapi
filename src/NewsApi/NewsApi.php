<?php

namespace Trozgan\NewsApi;

use Trozgan\NewsApi\Requests\Sources;
use Trozgan\NewsApi\Requests\TopHeadlines;
use Trozgan\NewsApi\Requests\Everything;

class NewsApi {
  public function sources(){
    return new Sources();
  }

  public function topHeadlines(){
    return new TopHeadlines();
  }

  public function everything(){
    return new Everything();
  }
}
