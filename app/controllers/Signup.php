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

    // show($_POST);
    $data['errors'] = [];
    
    $user = new User();
    // $result = $user->validate($_POST);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      if($user->validate($_POST))
      {
        /*
        $query = "insert into users (email, firstname, lastname, password, role, date) values (:email, :firstname, :lastname, :password, :role, :date) ";

        $arr['firstname'] = $_POST['firstname'];
        $arr['lastname'] = $_POST['lastname'];
        $arr['email'] = $_POST['email'];
        $arr['password'] = $_POST['password'];
        $arr['role'] = 'user';
        $arr['date'] = date('Y-m-d H:i:s');
    
        $db = new Database();
        $db->query($query, $arr);
        */
        $_POST['date'] = date('Y-m-d H:i:s');
        $user->insert($_POST);

        message("Your profile was successfully created. Please login");
        redirect('login');
      }
    }
 
    // var_dump($result);
    // show($user->errors);
    // show($_POST);
    $data['errors'] = $user->errors;
    $data['title'] = 'Signup';

    $this->view('signup', $data);
  }
 

}
 