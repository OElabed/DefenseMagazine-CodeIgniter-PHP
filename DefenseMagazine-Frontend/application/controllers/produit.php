<?php 

class Produit extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Compte_model');
		$this->load->model('acceuil_model');
		$this->load->model('Categorie_model');
		$this->load->model('Produit_model');
	}
	
	public function index(){	
			
		
			
		}
	
	
	
	
	public function produit_affiche(){
						 
			$id_prod = $this->uri->segment(3);
			
			$prod = $this->Produit_model->get_produit($id_prod);
			$data['prod']= $prod;
			$data['fiche_categ'] = $this->Categorie_model->get_categorie_b_nom($prod['nom_categorie']);
			
			
			
			$data['titre_page']= 'Fiche produit';
			$data['fonction_titre']= 'Fiche produit';	
			$data['nom_vue_doite']= 'produit_contenu_droit.php';
			$data['nom_vue_gauche']= 'produit_contenu_gauche.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_nouv_categ'] = $this->nouveaute_sous_categorie($prod['nom_categorie']);
			$data['list_drap'] = $this->drap_get();
			
			$data['page_contenu'] = $this->load->view('produit/produit_theme.php',$data,TRUE);
			$this->load->view('layout',$data);
		
	}
	
	

	
	private function nouveaute_sous_categorie($nom_categ){
		
		$list_nouv_categ = $this->Categorie_model->nouv_sous_categ($nom_categ);
		return  $list_nouv_categ;
		
	}
	
	
	
	
	private function affiche_categ(){
		
		$this->load->model('Categorie_model');
		$data['list_categ_a']= $this->Categorie_model->get_all_categorie_a();
		$data['list_categ_b']= $this->Categorie_model->get_all_categorie_b_noid();
		
		return $data;
	}
	
	
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}







}
?>