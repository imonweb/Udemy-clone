<?php 

class App 
{
  protected $controller = '_404';

  function __construct()
  {
   $arr = $this->getURL();

   $filename = '../app/controllers/' . ucfirst($arr[0]) . '.php';

   if(file_exists($filename ))
   {
    require $filename;
   } else {
    require '../app/controllers/' . $controller . '.php';
   }
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
// var_dump($app);