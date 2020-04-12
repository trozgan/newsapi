<?php
namespace Trozgan\NewsApi;

use Illuminate\Support\ServiceProvider;

class NewsApiServiceProvider extends ServiceProvider {
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot(){
    $configPath = __DIR__.'/../config';
    $this->mergeConfigFrom($configPath.'/config.php', 'newsapi');
    $this->publishes([
      $configPath.'/config.php' => config_path('newsapi.php'),
    ], 'config');
  }

  /**
  * Register any package services.
  *
  * @return void
  */
  public function register(){
    $this->app->singleton('newsapi', function(){
      return new NewsApi();
    });
  }
}
