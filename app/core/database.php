<?php
/**
* Database
*   
*
 **/

class Database
{
  private function connect()
  {
    $str = DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
    return new PDO($str, DBUSER, DBPASS);
    // $con = new PDO($str, 'imon', 'p@ssw0rd');
    // return $con;
  }

  public function query($query, $data)
  {
    $con = $this->connect();
    // show($con);
  }

  
}