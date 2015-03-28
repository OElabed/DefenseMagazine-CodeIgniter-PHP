<?php 

class Acceuil extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Produit_model');
		$this->load->model('acceuil_model');
		$this->load->library('pagination');
		
	}
	
	
	
	public function index(){	
			
			$this->librerie();
			
		}
		
		
		
	public function librerie(){
			
			$data['titre_page']= 'Bienvenue dans Def. Mag';
			$data['fonction_titre']='Librerie';	
			$data['nom_vue_doite']= 'acceuil_der_achat.php';
			$data['nom_vue_gauche']= 'acceuil_contenu.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
			$data['list_select'] = $this->selection_boutique();
			$data['list_nouveau'] = $this->nouveaute_list();
			$data['list_top_prod'] = $this->top_prod_vendu();
			
			
			$data['page_contenu'] = $this->load->view('acceuil/acceuil_theme',$data,TRUE);
			$this->load->view('layout',$data);
	}
	
	
	public function nouveaute(){
			
			$data['titre_page']= 'Nouveautés';
			$data['fonction_titre']='Nouveautés';	
			$data['nom_vue_doite']= 'acceuil_der_achat.php';
			$data['nom_vue_gauche']= 'nouveaute_contenu.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_drap'] = $this->drap_get();
			$data['list_der_achat'] = $this->dernier_achats();
			
			
			/******/
			$config['base_url'] = base_url().'Acceuil/nouveaute/';
			$config['total_rows'] = $this->acceuil_model->nouveaute_boutique_all()->num_rows();
			$config['per_page'] = 7;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['prod_list'] = $this->acceuil_model->nouveaute_boutique_all_limit( $config['per_page'], $this->uri->segment(3,0));
			/*****/
			
			
			$data['page_contenu'] = $this->load->view('acceuil/acceuil_theme',$data,TRUE);
			$this->load->view('layout',$data);
	}
	
	
	public function meilleur_vendue(){
			
			$data['titre_page']= 'Toutes les meilleures ventes ';
			$data['fonction_titre']='Meilleures ventes';	
			$data['nom_vue_doite']= 'acceuil_der_achat.php';
			$data['nom_vue_gauche']= 'meilleur_vente_contenu.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_drap'] = $this->drap_get();
			$data['list_der_achat'] = $this->dernier_achats();
			
			
			/******/
			$config['base_url'] = base_url().'Acceuil/meilleur_vendue/';
			$config['total_rows'] = $this->acceuil_model->top_produit_all()->num_rows();
			$config['per_page'] = 7;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['prod_list'] = $this->acceuil_model->top_produit_all_limit( $config['per_page'], $this->uri->segment(3,0));
			/*****/
			
			
			$data['page_contenu'] = $this->load->view('acceuil/acceuil_theme',$data,TRUE);
			$this->load->view('layout',$data);
	}
	
	public function change_monnaie(){
		
		$monnaie_get =$this->acceuil_model->get_drap_by_nompys($this->input->post('monnaie'));
		
		
		
		$newdata = array(
			'nom_mon' => $monnaie_get['nom_mon'] ,
			'mult_mon' => $monnaie_get['mult_mon'] ,
			'tof_pays' => $monnaie_get['tof_pays']

		);
		
		$this->session->set_userdata('monnaie', $newdata);
		
		
		redirect($this->input->post('page_cour'));
	}
	
	
	
	
	
	
	
	
	
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}
	
	
	private function dernier_achats(){
		
		$list_der_achat = $this->acceuil_model->dernier_achat(); 		
		return $list_der_achat;
		
	}
	
	private function selection_boutique(){
		
	$list_select = $this->acceuil_model->select_boutique();
	return $list_select;
	}
	
	private function nouveaute_list(){
		
		$list_nouveau = $this->acceuil_model->nouveaute_boutique();
		return $list_nouveau;
	}
	
	private function top_prod_vendu(){
		$list_top_prod = $this->acceuil_model->top_produit();
		return $list_top_prod;
	}
	
	private function nouveaute_boutique_all(){
		$list_nouveau = $this->acceuil_model->nouveaute_boutique_all();
		return $list_nouveau;
	}
		
	private function affiche_categ(){
		
		$this->load->model('Categorie_model');
		$data['list_categ_a']= $this->Categorie_model->get_all_categorie_a();
		$data['list_categ_b']= $this->Categorie_model->get_all_categorie_b_noid();
		
		return $data;
	}
	
	








}
?>