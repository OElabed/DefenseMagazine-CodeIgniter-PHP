<?php

class Expedition extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	
	
	public function index(){
		
		$this->choix_expedition();
		
	}
	
	public function choix_expedition(){
		$data['fonction_titre']='Choix d\'Expédition';	
		$data['titre_page']= 'Choix d\'Expédition';
		$data['titre_interne']= 'Choix d\'Expédition';
		$data['nom_vue']= 'choix_espedition.php';	
		
		
			
		$data['page_contenu'] = $this->load->view('expedition/theme_expedition',$data,TRUE);
		$this->load->view('layout_admin',$data);	
	}
	
	public function livraison_standard(){
		$data['fonction_titre']='Livraison standard';	
		$data['titre_page']= 'Livraison standard';
		$data['titre_interne']= 'Livraison standard';
		$data['nom_vue']= 'livraison_standard.php';	
			
		
		$data['page_contenu'] = $this->load->view('expedition/theme_expedition',$data,TRUE);
		$this->load->view('layout_admin',$data);	
	}
	
	public function livraison_rapid(){
		$data['fonction_titre']='Livraison rapide';	
		$data['titre_page']= 'Livraison rapide';
		$data['titre_interne']= 'Livraison rapide';
		$data['nom_vue']= 'livraison_rapid.php';	
		
		
		$data['page_contenu'] = $this->load->view('expedition/theme_expedition',$data,TRUE);
		$this->load->view('layout_admin',$data);	
	}
	




	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'Vous n\'avez pas la permission d\'acc&eacute;der &agrave; cette page. <a href="'. base_url().'login">Login</a>';		
			die();		
		}		
	}













}
?>