<?php

Class Signup extends Controller 
{
	function index()
	{
 	 	$data['page_title'] = "S'inscrire";

 	 	if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['password_confirmation']))
 	 	{	
 	 		$user = $this->loadModel("user");
 	 		$user->signup($_POST);

 	 	}
 	 	
		$this->view("signup",$data);
	}

}