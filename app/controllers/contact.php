<?php

Class Contact extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Contactez Nous";
		$this->view("contact",$data);
	}

}