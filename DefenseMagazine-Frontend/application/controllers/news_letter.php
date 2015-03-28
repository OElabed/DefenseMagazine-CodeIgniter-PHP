<?php 

class News_letter extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		
		$this->load->model('acceuil_model');
		$this->load->model('Produit_model');
		$this->load->model('newsletter_model');
		$this->load->model('Compte_model');
		
	}
	
	public function index(){	
			
			$this->abonner();
			
		}

	public function abonner(){
			
			$this->abonner_submit();
			$data['titre_page']= 'S\'abonner à Newsletter';
			$data['fonction_titre']='S\'abonner à Newsletter';	
			$data['nom_vue_doite']= 'newsletter_droite.php';
			$data['nom_vue_gauche']= 'newsletter_gauche.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			
			$data['list_nouveau'] = $this->nouveaute_list();
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
			
			$data['page_contenu'] = $this->load->view('newsletter/newsletter_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
		
	}
	
	public function abonner_submit(){
		
		
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|xss_clean');
		 $this->form_validation->set_rules('email','Email','trim|required|min_length[7]|xss_clean|valid_email|callback_email_not_exist');
		 
		 if ($this->form_validation->run() == TRUE){
			
				 $abonner['nom_news']=  $this->input->post('nom');
				 $abonner['prenom_news']=  $this->input->post('prenom');
				 $abonner['email_news']=  $this->input->post('email');
				 
				 $this->newsletter_model->ajout_abonner($abonner);
				 redirect('acceuil');
			}
		 
		 
		 
		 
	}
	
	public function email_not_exist($email){
		
		$this->form_validation->set_message('email_not_exist','► %s est déja utilisé. Choisir un autre %s.');
		
		if ($this->newsletter_model->exist_abonner($email))
		{
			return FALSE;
		}else
		{
			return TRUE;
		}
		
		
		
	}
	
	
		private function dernier_achats(){
		
		$list_der_achat = $this->acceuil_model->dernier_achat(); 		
		return $list_der_achat;
		
	}
	
		private function affiche_categ(){
		
		$this->load->model('Categorie_model');
		$data['list_categ_a']= $this->Categorie_model->get_all_categorie_a();
		$data['list_categ_b']= $this->Categorie_model->get_all_categorie_b_noid();
		
		return $data;
	}
	
	private function nouveaute_list(){
		
		$list_nouveau = $this->acceuil_model->nouveaute_boutique();
		return $list_nouveau;
	}
	
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}

}
?>