<?php 

class Categorie extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('acceuil_model');
		$this->load->model('Compte_model');
		$this->load->model('Produit_model');
		$this->load->model('Categorie_model');
		$this->load->library('pagination');
	}
	
	public function index(){	
			
		
			
		}
	
	
	public function categorie_affiche(){
						 
			$nom_categ = $this->uri->segment(3);
			
			
			
			$data['titre_page']= $nom_categ;
			$data['fonction_titre']= $nom_categ;	
			$data['nom_vue_doite']= 'categorie_contenu_droit.php';
			$data['nom_vue_gauche']= 'categorie_contenu_gauche.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_nouv_categ'] = $this->nouveaute_categorie($nom_categ);
			$data['list_drap'] = $this->drap_get();
			/******/
			$config['base_url'] = base_url().'Categorie/categorie_affiche/'.$nom_categ;
			$config['total_rows'] = $this->Categorie_model->prod_categ_a($nom_categ)->num_rows();
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['prod_list'] = $this->Categorie_model->prod_categ_limit($nom_categ, $config['per_page'], $this->uri->segment(4,0));
			/*****/
			
			$data['page_contenu'] = $this->load->view('categorie/categorie_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
	}
	
	
	public function sous_categorie_affiche(){
						 
			$nom_categ = $this->uri->segment(3);
			
			$data['fiche_categ'] = $this->Categorie_model->get_categorie_b_nom($nom_categ);
			
			
			
			$data['titre_page']= $nom_categ;
			$data['fonction_titre']= $nom_categ;	
			$data['nom_vue_doite']= 'sous_categorie_contenu_droit.php';
			$data['nom_vue_gauche']= 'sous_categorie_contenu_gauche.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_nouv_categ'] = $this->nouveaute_sous_categorie($nom_categ);
			$data['list_drap'] = $this->drap_get();
			/******/
			$config['base_url'] = base_url().'Categorie/sous_categorie_affiche/'.$nom_categ;
			$config['total_rows'] = $this->Categorie_model->prod_categ_b($nom_categ)->num_rows();
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['prod_list'] = $this->Categorie_model->prod_sous_categ_limit($nom_categ, $config['per_page'], $this->uri->segment(4,0));
			/*****/
			
			$data['page_contenu'] = $this->load->view('sous_categorie/sous_categorie_theme.php',$data,TRUE);
			$this->load->view('layout',$data);
		
	}
	
	
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}
	
	private function nouveaute_categorie($nom_categ){
		
		$list_nouv_categ = $this->Categorie_model->nouv_categ($nom_categ);
		return  $list_nouv_categ;
		
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
	
	








}
?>