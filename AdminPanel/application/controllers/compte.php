<?php 

class Compte extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Compte_model');
		$this->is_logged_in();
	}
	
	
	
	public function index(){	
		
		$this->compte_affiche();
		
	}
	
	public function compte_affiche(){
		
		$data['fonction_titre']='Détails de Compte Administrateur';	
		$data['titre_page']= 'Détails de Compte Administrateur';
		$data['titre_interne']= 'Détails de Compte Administrateur';
		$data['nom_vue']= 'compte_affiche.php';
	
		$data['info']= $this->Compte_model->get_admin() ;
			
		$data['page_contenu'] = $this->load->view('compte/theme_compte',$data,TRUE);
		$this->load->view('layout_admin',$data);	
		
		
	}
	
	public function compte_editer(){
		$this->compte_editer_submit();
		$data['fonction_titre']='Modifier Compte Administraeur';	
		$data['titre_page']= 'Modifier Compte Administrateur';
		$data['titre_interne']= 'Modifier Compte Administrateur';
		$data['nom_vue']= 'compte_edit.php';
	
		$data['info']= $this->Compte_model->get_admin() ;
			
		$data['page_contenu'] = $this->load->view('compte/theme_compte',$data,TRUE);
		$this->load->view('layout_admin',$data);	
		
		
	}
	
	
	public function compte_editer_submit(){
		
	if($this->input->post('valider')){
	
		 $this->form_validation->set_rules('email','Email','trim|required|min_length[7]|xss_clean|valid_email');
		 $this->form_validation->set_rules('login','Login','trim|required|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('password','Mot de passe','trim|required|alpha_numeric|min_length[6]|xss_clean');
		 $this->form_validation->set_rules('password_vf','Confirmation','trim|required|alpha_numeric|min_length[6]|matches[password]|xss_clean');
		 
		 
		 if ($this->form_validation->run() == TRUE){
		
				 
			  
			 	$admin['email']=  $this->input->post('email');
			 	$admin['login']=  $this->input->post('login');
				$admin['mot_pass']=  do_hash($this->input->post('password')); 
				 
				 $this->Compte_model->update_admin($admin);
				 redirect('Compte/compte_affiche');
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