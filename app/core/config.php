<?php 

// echo "<pre";
// print_r($_SERVER);

 
/* ====== app info ====== */
define('APP_NAME', 'Udemy App');
define('APP_DESC', 'Free and paid tutorials');

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
} else {
  // database config for your live server
  define('DBHOST', 'localhost');
  define('DBNAME', 'php_udemy_clone');
  define('DBUSER', 'imon');
  define('DBPASS', 'p@ssw0rd');
  define('DBDRIVER', 'mysql');
}