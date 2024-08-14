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
    'image',
    'about',
    'company',
    'job',
    'country',
    'address',
    'phone',
    'slug',
    'facebook',
    'instagram',
    'twitter',
    'linkedin',

  ];

  public function validate($data)
  {
    $this->errors = [];

    if(empty($data['firstname']))
    {
      $this->errors['firstname'] = 'A first name is required';
    } else 
    if(!preg_match("/^[a-zA-Z]+$/", trim($data['firstname'])))
    {
      $this->errors['firstname'] = 'first name can only have letters without spaces';
    }

    if(empty($data['lastname']))
    {
      $this->errors['lastname'] = 'A last name is required';
    } else 
    if(!preg_match("/^[a-zA-Z]+$/", trim($data['lastname'])))
    {
      $this->errors['lastname'] = 'last name can only have letters without spaces';
    }

    // if(empty($data['firstname']))
    // {
    //   $this->errors['firstname'] = 'A first name is required';
    // }

    // if(empty($data['lastname']))
    // {
    //   $this->errors['lastname'] = 'A last name is required';
    // }

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


  public function edit_validate($data, $id)
  {
    $this->errors = [];

    if(empty($data['firstname']))
    {
      $this->errors['firstname'] = 'A first name is required';
    } else 
    if(!preg_match("/^[a-zA-Z]+$/", trim($data['firstname'])))
    {
      $this->errors['firstname'] = 'first name can only have letters without spaces';
    }

    if(empty($data['lastname']))
    {
      $this->errors['lastname'] = 'A last name is required';
    } else 
    if(!preg_match("/^[a-zA-Z]+$/", trim($data['lastname'])))
    {
      $this->errors['lastname'] = 'last name can only have letters without spaces';
    }

 
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}else

		//check email
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}else
		if($results = $this->where(['email'=>$data['email']]))
		{
			foreach ($results as $result) {
				if($id != $result->id)
					$this->errors['email'] = "That email already exists";
			}
			
		}
    
    if(!preg_match("/^(09|\+2609)[0-9]{8}$/", trim($data['phone'])))
    {
      if(!filter_var($data['phone'], FILTER_VALIDATE_URL))
      {
        $this->errors['phone'] = "phone number is not valid";
      }
    }

    if(!empty($data['facebook']))
    {
      if(!filter_var($data['facebook'], FILTER_VALIDATE_URL))
      {
        $this->errors['facebook'] = "Facebook is not valid";
      }
    }

    if(!empty($data['instagram']))
    {
      if(!filter_var($data['instagram'], FILTER_VALIDATE_URL))
      {
        $this->errors['instagram'] = "Instagram is not valid";
      }
    }

    if(!empty($data['linkedin']))
    {
      if(!filter_var($data['linkedin'], FILTER_VALIDATE_URL))
      {
        $this->errors['linkedin'] = "LinkedIn is not valid";
      }
    }

    if(!empty($data['twitter']))
    {
      if(!filter_var($data['twitter'], FILTER_VALIDATE_URL))
      {
        $this->errors['twitter'] = "Twitter is not valid";
      }
    }

    if(empty($this->errors))
    {
      return true;
    }
    return false;
  }

  

} // class User