 <?php
/**
*
*   
*
*/

class Home 
{
  public function index($id)
  {
    echo 'home page' . $id;
  }

  public function edit()
  {
    echo 'home editing';
  }

  public function delete($id)
  {
    echo 'home delete ' . $id;
  }



}
 