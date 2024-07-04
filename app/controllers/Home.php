 <?php
/**
*
*   
*
*/

class Home extends Controller
{
  public function index()
  {
    // $db = new Database();
    // $db->create_tables();
    // $res = $db->query("select * from users");

    // show($res);

    // $users = new User();
    // $users->insert($data);
    // $users->insert($data);
    
    $data['title'] = 'Home';

    $this->view('home', $data);
  }
 

}
 