<?php 

/*
* Signup class
*/

class Signup extends Controller
{
  public function index()
  {
    // create users table
    // $db = new Database();
    // $db->create_tables();

    $user = new User();
    $result = $user->validate($_POST);
    var_dump($result);
    show($user->errors);

    show($_POST);
    
    $data['title'] = 'Signup';

    $this->view('signup', $data);
  }
 

}
 