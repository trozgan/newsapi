<?php
namespace Trozgan\NewsApi;

use GuzzleHttp\Client as Client;
use Trozgan\NewsApi\Exceptions\ApiRequestException;

class NewsApiClient {

    protected $client;
    protected $apiKey;
    protected $pageSize = 100;
    protected $page = 1;

    public function __construct(){
      $url = [
        'base_uri'  => 'https://newsapi.org/v2/',
      ];
      $this->client = new Client($url);

      $this->apiKey = config('newsapi.api_key');
      if(empty($this->apiKey)){
        throw new \InvalidArgumentException('No API key specified');
      }
    }

    protected function call($url,$params = []) {
      $query = [
        'apiKey' => $this->apiKey,
        'pageSize' => $this->pageSize,
        'page' => $this->page
      ];

      $query = array_merge($query,$params);

      $response = $this->client->get($url, ['query' => $query]);

      $body = json_decode($response->getBody()->getContents());

      if(property_exists($body, 'error')){
        if(is_object($body->error)){
          throw new ApiRequestException($body->error->message, $body->error->code);
        } else {
          throw new ApiRequestException($body->error, 500);
        }
        return $response;
      }

      return $body;
    }

    public function setPageSize($pageSize){
      $this->pageSize = $pageSize;
      return $this;
    }

    public function setPage($page){
      $this->page = $page;
      return $this;
    }
}
