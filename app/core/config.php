<?php 

// echo "<pre";
// print_r($_SERVER);

 
/* ====== app info ====== */
define('APP_NAME', 'Udemy App');
define('APP_DESC', 'Free and paid tutorials');
// define('ROOT', 'http://localhost/php/Quick-Programming/udemy-clone/public');


/*  
* database config
*/

if($_SERVER['SERVER_NAME'] == 'localhost')
{
  // database config for your local server
  define('DBHOST', 'localhost');
  define('DBNAME', 'php_udemy_clone');
  define('DBUSER', 'imon');
  define('DBPASS', 'p@ssw0rd');
  define('DBDRIVER', 'mysql');

  // root path e.g. localhost
  define('ROOT', 'http://localhost/php/Quick-Programming/udemy-clone/public');
} else {
  // database config for your live server
  define('DBHOST', 'localhost');
  define('DBNAME', 'php_udemy_clone');
  define('DBUSER', 'imon');
  define('DBPASS', 'p@ssw0rd');
  define('DBDRIVER', 'mysql');

  // root path .e.g. https://www.udemy-clone.com
  define('ROOT', 'http://localhost/php/Quick-Programming/udemy-clone/public');
}