<?php
/**
*
* authentication class   
*
 **/

class Auth 
{
  public static function Authenticate($row)
  {
    if(is_object($row)){
      $_SESSION['USER_DATA'] = $row;
    }
  }

  public static function Logout()
  {
    if(!empty($_SESSION['USER_DATA'])){
      unset($_SESSION['USER_DATA']);

      // session_unset();
      // session_regenerate_id();
    }
  }

  public static function logged_in()
  {
    if(!empty($_SESSION['USER_DATA']))
    {
      return true;
    }
    return false;
  }

  public static function is_admin()
  {
    if(!empty($_SESSION['USER_DATA']))
    {
      if($_SESSION['USER_DATA'] == 'admin'){
        return true;
      }
    }
    return false;
  }

} // class Auth