<?php

Class Home extends Controller 
{
	private $DB;

	function __construct() {
		$this->DB = new Database();
	}
	function index()
	{
 	 	
 	 	$data['page_title'] = "Acceuil";

		$this->view("index",$data);
	}
	function getMoviesPictures(){
		
		$query= "SELECT DISTINCT f.image_file FROM film f JOIN diffuser d ON f.idfilm= d.idfilm WHERE f.image_file IS NOT NULL";
		$pics= $this->DB->read($query);
		$pics[count($pics)]=$pics[0];
		return $pics;
	}

	function showPictures() {
		$pics = $this->getMoviesPictures();
		$count = count($pics);
		
		echo '<div class="slider-container slider-1" data-count="' . $count . '">';
		echo '<div class="slider">';
		
		foreach ($pics as $pic) {
			echo '<img src="' . $pic->image_file . '" alt="" class="img-carroussel">';
		}
		
		echo '</div>';
		echo '</div>';
	}

}