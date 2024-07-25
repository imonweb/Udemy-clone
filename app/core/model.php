<?php
/**
*
*  main model class 
*
 **/

class Model extends Database 
{
  protected $table = "";
  public function insert($data)
  {
    // remove unwanted columns 
    if(!empty($this->allowedColumns)){
      
      foreach($data as $key => $value){
      // foreach($this->allowedColumns as $key => $value){
        if(!in_array($key, $this->allowedColumns))
        {
          unset($data[$key]);
        }
      }
    }
    // show($data);


    $keys = array_keys($data);
    $values = array_values($data);

    // $query = "insert into users () values ()";
    $query = "insert into " . $this->table;
    $query .= "(".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

    $this->query($query, $data);
    /*
    echo $query;

    $db = new Database();
    // $db->query($query, $values);
    $db->query($query, $data);

    show($query);
    // show($values);
    show($data);
    */
  }

  public function where($data)
  {
    
    $keys = array_keys($data);

    $query = "select * from " .$this->table. " where ";

    foreach($keys as $key){
      $query .= $key . "=:" . $key . " && ";
    }

    $query = trim($query, "&& ");
    // echo $query; die;
    // $query .= " ".implode(",", $keys) . " && id = :id limit 1";

    // $keys = array_keys($data);
    // $values = array_values($data);
 
    // $query = "insert into " . $this->table;
    // $query .= "(".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

    $res = $this->query($query, $data);

    if(is_array($res))
    {
      return $res;
    }

    return false;
 
  }
 
}