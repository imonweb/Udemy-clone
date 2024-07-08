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

    show($_POST);
    
    $data['title'] = 'Signup';

    $this->view('signup', $data);
  }
 

}
 