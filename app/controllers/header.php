<?php
Class Header extends Controller 
{
	function index()
	{
		unset($_SESSION['error_message']);
	}

    function displayHeader($pageTitle){
        $data['pageClassMap']=$this->getPageClassMap();
        $data['pageName']=$this->getPageName();
        $data['pageTitle']=$pageTitle;
        $data['currentPage']=$this->getCurrentPage();
        $data['CSS']=$this->getCSS();
        $this->view("header",$data);
    }
    function getPageClassMap(){
        $currentPage=$this->getCurrentPage();
        if (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='gerant'){

        $pageClassMap = [
            'home' => 'nav_elmt',
            'seancesclient' => 'nav_elmt',
            'sallegerant' => 'nav_elmt'
        ];
        
        }elseif (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='admin'){
            $pageClassMap = [
                'home' => 'Accueil',
                'adminusers' => 'nav_elmt',
                'faq' => 'nav_elmt'
            ];
            
        }else{

            $pageClassMap = [
                'home' => 'nav_elmt',
                'seancesclient' => 'nav_elmt',
                'cinema' => 'nav_elmt'
            ];
           
            
        }
        return $pageClassMap;
        
    }
    function getPageName(){
        $currentPage=$this->getCurrentPage();
        if (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='gerant'){

        $pageName=[
            'home' => 'Accueil',
            'seancesgerant' => 'Séances',
            'sallegerant' => 'Salles'
        ];
        }elseif (isset($_SESSION["username"]) && htmlspecialchars($_SESSION['type'])=='admin'){

            $pageName=[
                'home' => 'Accueil',
                'adminusers' => 'Utilisateurs',
                'faq' => 'FAQ'
            ];
        }else{

            $pageName=[
                'home' => 'Accueil',
                'seancesclient' => 'Séances',
                'cinema' => 'Salles'
            ];
        }
        return $pageName;

    }
    function getCurrentPage(){
        $currentURL = strtok($_SERVER['REQUEST_URI'], '?');
        $currentPage = basename($currentURL); 
        return $currentPage;
    }
    function getCSS(){
        $currentPage=$this->getCurrentPage();
        if($currentPage=="home" || $currentPage=="public"){
            return ASSETS."css/index.css";
        }else{
            return ASSETS."css/".$currentPage.".css";
        }
    }

}