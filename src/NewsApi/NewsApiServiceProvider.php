<?php
namespace Trozgan\NewsApi;

use Illuminate\Support\ServiceProvider;

class NewsApiServiceProvider extends ServiceProvider {
    public function boot(){
      $configPath = __DIR__.'/../config';
      $this->mergeConfigFrom($configPath.'/config.php', 'newsapi');
      $this->publishes([
        $configPath.'/config.php' => config_path('newsapi.php'),
      ], 'config');
    }

    public function register(){
      $this->app->singleton('newsapi', function(){
        return new NewsApi();
      });
    }
}
