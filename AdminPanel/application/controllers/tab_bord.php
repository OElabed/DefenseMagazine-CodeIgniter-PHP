<?php

class Tab_bord extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->is_logged_in();
		}
	
	
	public function index(){
		
		$this->statut();
		
	}
	
	
	
	
	public function statut(){
	
		$data['fonction_titre']='Statut';	
		$data['titre_page']= 'Statut';
		$data['titre_interne']= 'Statut';
		$data['nom_vue']= 'statut.php';
	
		$this->load->model('Client_model');
		$this->load->model('Commande_model');
		$this->load->model('Produit_model');
		
		$list = $this->Client_model->get_all_client_row();
		$data['nb_cli'] = $list->num_rows();
		
		$list = $this->Produit_model->get_all_produit_row();
		$data['nb_prod'] = $list->num_rows();
		
		$list = $this->Commande_model->get_all_cmd('Livré');
		$data['nb_cmd_liv'] = $list->num_rows();
		
		$list = $this->Commande_model->get_all_cmd('Annulé');
		$data['nb_cmd_anl'] = $list->num_rows();
		
		$list = $this->Commande_model->get_all_cmd('En Attente');
		$data['nb_cmd_att'] = $list->num_rows();
		
		
		
		$data['page_contenu'] = $this->load->view('tab_bord/theme_tab_bord',$data,TRUE);
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