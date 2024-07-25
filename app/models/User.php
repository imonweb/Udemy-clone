<?php 

/*
* Users model
*/

class User extends Model
{
  public $errors = [];
  protected $table = "users";

  protected $allowedColumns = [
    'email',
    'firstname',
    'lastname',
    'password',
    'role',
    'date',

  ];

  public function validate($data)
  {
    $this->errors = [];

    if(empty($data['firstname']))
    {
      $this->errors['firstname'] = 'A first name is required';
    }

    if(empty($data['lastname']))
    {
      $this->errors['lastname'] = 'A last name is required';
    }

    // if(empty($data['email']))
    // {
    //   $this->errors['email'] = 'A email is required';
    // }

    //check email
		// $query = "select * from users where email = :email limit 1";
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}else
		if($this->where(['email'=>$data['email']]))
		{
			$this->errors['email'] = "That email already exists";
		}

    if(empty($data['password']))
		{
			$this->errors['password'] = "A password is required";
		}

		if($data['password'] !== $data['retype_password'])
		{
			$this->errors['password'] = "Passwords do not match";
    }
    
    if(empty($data['terms']))
    {
      $this->errors['terms'] = 'Please accept the terms and conditions';
    }

    

    if(empty($this->errors))
    {
      return true;
    }
    return false;
  }

  

} // class User