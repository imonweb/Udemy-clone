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
    show($con);
    $stm = $con->prepare($query);
    if($stm)
    {
      $chk = $stm->execute($data);
      if($chk)
      {
        $type = PDO::FETCH_OBJ;
        if($type == 'object')
        {
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

}