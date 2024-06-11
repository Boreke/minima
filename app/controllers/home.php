<?php

Class Home extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Acceuil";

		$this->view("index",$data);
	}

}