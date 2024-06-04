<?php 

class App 
{
  function __construct()
  {
    print_r($_GET);
  }
 
}

$app = new App();
// var_dump($app);