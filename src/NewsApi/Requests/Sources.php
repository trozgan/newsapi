<?php

namespace Trozgan\NewsApi\Requests;

class Sources extends BaseRequest {

    public $url = 'sources/';

    public function all(){
      return $this->get();
    }
}
