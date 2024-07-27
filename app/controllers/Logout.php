 <?php
/**
*
*   class Logout
*
*/

class Logout extends Controller
{
  public function index()
  {
    
    Auth::logout();
    redirect('home');
  }
 

}
 