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

  public function query($query, $data = [], $type = 'object')
  {
    $con = $this->connect();
    // show($con);
    $stm = $con->prepare($query);
    if($stm)
    {
      $chk = $stm->execute($data);
      if($chk)
      {
        // $type = PDO::FETCH_OBJ;
        if($type == 'object')
        {
          $type = PDO::FETCH_OBJ;
        } else {
          $type = PDO::FETCH_ASSOC;

        }
        $result = $stm->fetchAll($type);

        if(is_array($result) && count($result) > 0)
        {
          return $result;
        }
      }
    }
    return false;
  }

  public function create_tables()
  {
    // users table 
    $query = "
      CREATE TABLE IF NOT EXISTS `users1` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `email` varchar(100) NOT NULL,
        `firstname` varchar(30) NOT NULL,
        `lastname` varchar(30) NOT NULL,
        `password` varchar(255) NOT NULL,
        `role` varchar(20) NOT NULL,
        `date` date DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `email` (`email`),
        KEY `firstname` (`firstname`),
        KEY `lastname` (`lastname`),
        KEY `date` (`date`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ";

    $this->query($query);
  }

}