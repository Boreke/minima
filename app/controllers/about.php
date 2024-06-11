<?php

Class About extends Controller
{
	function index()
	{
		$data['page_title'] = "A propos de nous";
		$this->view("about-us",$data);
	}

}