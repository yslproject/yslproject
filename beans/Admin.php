<?php
class Admin
{
	public $name;
	public $password;
	
	function __construct($name,$password){
		$this->name = $name;
		$this->password = $password;
	}
}

