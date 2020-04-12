<?php

namespace NewsApi;

use NewsApi\Requests\Sources;
use NewsApi\Requests\TopHeadlines;
use NewsApi\Requests\Everything;

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
