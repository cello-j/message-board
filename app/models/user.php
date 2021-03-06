<?php

class User extends AppModel
{
    public $validation = array(
       'username' => array(
	      'length'=> array(
		     	'type' => 'validate_between', 
		     	'min' => 6, 
		     	'max' => 32,
		      ),
       ),
       'password' => array(
	       'length'=> array(
		     	'type' => 'validate_between', 
		     	'min' => 6, 
		     	'max' => 12,
		      ),
       ),
       'password_check' => array(
	     'match' => array(
	       'confirm_password',
	     ),
       ),
    );

    public function add_new($user)
    {
		$this->validation['password_check']['match'][] = $this->password;
		$this->validation['password_check']['match'][] = $this->password_check;

		$this->validate();
		if ($this->hasError() || $user->hasError()){
			throw new ValidationException('invalid user');
		}

		$db = DB::conn();
		$db->begin();

		$db->query('INSERT INTO user SET username = ?, password = ?, created = NOW()', array($this->username, hash_password($this->password))); 

		$db->commit();
    }

    public function get_hash_password()
    {
    	$db = DB::conn(); 
    	$row = $db->row('SELECT password FROM user WHERE username = ?', array($this->username));
    	return $row;

    }

    public function allow_login()
    {

		 $db = DB::conn();
		 $row = $db->row('SELECT id, username FROM user WHERE username = ? AND password = ?', array($this->username, $this->password));

     	 return $row;
    }

} 