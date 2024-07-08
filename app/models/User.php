<?php 

/*
* Users model
*/

class User
{
  protected $errors = [];
  protected $table = "users";

  public function validate($data)
  {
    if(empty($this->errors))
    {
      return true;
    }
    return false;
  }
 

}