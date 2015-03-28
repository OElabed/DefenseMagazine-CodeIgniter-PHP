<?php

class Vitrine extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('Produit_model');
			$this->load->model('Vitrine_model');
			$this->is_logged_in();
		}
	
	
	public function index(){
		
		$this->selection();
		
	}
	
	
	
	
	public function selection(){
	
		$data['fonction_titre']='La selection de la boutique';	
		$data['titre_page']= 'La selection de la boutique';
		$data['titre_interne']= 'La selection de la boutique';
		$data['nom_vue']= 'vitrine_selection.php';
	
		$data['gauche']= $this->Vitrine_model->get_selection_gauche();
		$data['droite']= $this->Vitrine_model->get_selection_droite();
		$data['query']= $this->Vitrine_model->get_all_prod();
			
		$data['page_contenu'] = $this->load->view('vitrine/vitrine_theme',$data,TRUE);
		$this->load->view('layout_admin',$data);

	}
	
	
		
	public function modif_select_gauche(){
		
		
		if($this->input->post('list_choix_g')!= ' ' ){
		
			$this->Vitrine_model->modif_select($this->input->post('list_choix_g'),'G');	
		}
		
		redirect('Vitrine/selection');
		
	}
	
	
	public function modif_select_droite(){
		
		
		if($this->input->post('list_choix_d')!= ' ' ){
		
			$this->Vitrine_model->modif_select($this->input->post('list_choix_d'),'D');	
		}
		
		redirect('Vitrine/selection');
		
	}
	
	
	
	public function monnaie(){
	
		$data['fonction_titre']='Gestion des monnaie';	
		$data['titre_page']= 'Gestion des monnaie';
		$data['titre_interne']= 'Gestion des monnaie';
		$data['nom_vue']= 'monnaie.php';
	
		$data['list_drap'] = $this->Vitrine_model->get_drap();
			
		$data['page_contenu'] = $this->load->view('vitrine/vitrine_theme',$data,TRUE);
		$this->load->view('layout_admin',$data);

	}
	
	public function modif_monnaie(){
		
		$id_mon= $this->uri->segment(3);
		$this->modif_monnaie_submit();
		$data['fonction_titre']='Modification de Taux de change';	
		$data['titre_page']= 'Modification de Taux de change';
		$data['titre_interne']= 'Modification de Taux de change';
		$data['nom_vue']= 'monnaie_modif.php';
		
		$data['drap_details'] = $this->Vitrine_model->get_drap_by_nompys($id_mon);
			
		$data['page_contenu'] = $this->load->view('vitrine/vitrine_theme',$data,TRUE);
		$this->load->view('layout_admin',$data);
		
	}
	
	public function modif_monnaie_submit(){
		if($this->input->post('valider')){
			
			
			$this->form_validation->set_rules('mult','Mult','trim|required|decimal|xss_clean');
			if ($this->form_validation->run() == TRUE){
			
				$this->Vitrine_model->update_monnaie($this->input->post('id_mon'),$this->input->post('mult'));
				redirect('Vitrine/monnaie');
			}
		}
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