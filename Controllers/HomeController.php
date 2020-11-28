<?php

//CLASE home controller para cargar el home del proyecto 

require 'models/login.php';


class HomeController
{

	private $login;

	public  function __construct()
	{
		
		$this->login = new Login;
	}


	public function index()
	{

		if (isset($_SESSION['user'])) {
			
			require 'views/layout.php';
			require 'views/home.php';
			
		}else{

			require 'views/login.php';
		}
		

	}




}