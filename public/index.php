<?php 

class App 
{
  function __construct()
  {
    print_r($this->getURL());
  }

  private function getURL()
  {
    $url = $_GET['url'] ?? 'home';
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $array = explode("/", $url);
    return $array;
  }
 
}

$app = new App();
var_dump($app);