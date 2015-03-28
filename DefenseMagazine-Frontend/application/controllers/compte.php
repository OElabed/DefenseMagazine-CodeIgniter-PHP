<?php 

class Compte extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('acceuil_model');
		$this->load->model('Produit_model');
		$this->load->model('client_model');
		$this->load->model('Compte_model');
		
	}
	
	
	
	public function index(){	
			
			$this->affiche_insc_connect();
			
		}
		
		
		
	public function affiche_insc_connect(){
			
			$this->submit_inscrire();
			$ch_error_insc=$this->submit_connexion();
			$data['ch_error_insc']=$ch_error_insc;
			$data['titre_page']= 'Mon compte';
			$data['fonction_titre']='S\'inscrire';	
			$data['nom_vue_doite']= 'compte_contenu_droite.php';
			$data['nom_vue_gauche']= 'compte_contenu_gauche.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
				
			
			$data['page_contenu'] = $this->load->view('compte/compte_theme',$data,TRUE);
			$this->load->view('layout',$data);
	}
	
	
	public function submit_inscrire(){
		if($this->input->post('submit_inscrire')){
			
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('email','Email','trim|required|min_length[7]|xss_clean|valid_email|callback_email_not_exist');
		 $this->form_validation->set_rules('tel','Téléphone','trim|required|numeric|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('password','Mot de passe','trim|required|alpha_numeric|min_length[6]|xss_clean');
		 $this->form_validation->set_rules('password_vf','Confirmation','trim|required|alpha_numeric|min_length[6]|matches[password]|xss_clean');
		
			if ($this->form_validation->run() == TRUE){
			
				 $client_aj['nom_client']=  $this->input->post('nom');
				 $client_aj['prenom_client']=  $this->input->post('prenom');
				 $client_aj['civil_client']=  $this->input->post('civilite');	
				 $client_aj['email_client']=  $this->input->post('email');
				 $client_aj['tel_client']=  $this->input->post('tel');
				 $client_aj['mot_pass_client']=  do_hash($this->input->post('password'));
				 $client_aj['pays_monnaie'] = $this->input->post('tarif');
				 
				 if ($this->input->post('newsletter') == 'abonner'){
					$client_aj['newsletter_client']= TRUE;
					
					 $this->load->model('newsletter_model');
					 $abonner['nom_news']=  $this->input->post('nom');
					 $abonner['prenom_news']=  $this->input->post('prenom');
					 $abonner['email_news']=  $this->input->post('email');
				 
				 	 $this->newsletter_model->ajout_abonner($abonner);	
				 }
				 else
				 {
				 	$client_aj['newsletter_client']= FALSE;
				 }
				 $this->client_model->ajouter_client($client_aj);
				 $monn = $this->acceuil_model->get_drap_by_mail($this->input->post('email_conx'));
				 	$data = array(
							'login' => $this->input->post('email'),
							'monnaie'=> $monn,
							'is_logged_in' => true,
							'cmd_data' => array()  
							);
			
					$this->session->set_userdata($data);
				 redirect('compte/voir_compte');
			}
			
			
		}
	}
	
	
	public function submit_connexion(){
		
		$ch_error='';
		if($this->input->post('submit_connexion')){
			
		
		 $this->form_validation->set_rules('email_conx','Email','trim|required|min_length[7]|xss_clean|valid_email');
		 $this->form_validation->set_rules('password_conx','Mot de passe','trim|required|alpha_numeric|min_length[6]|xss_clean');
		
		
			if ($this->form_validation->run() == TRUE ){
				
				if($this->client_model->client_inscrie($this->input->post('email_conx'),$this->input->post('password_conx'))== TRUE){
					
					$monn = $this->acceuil_model->get_drap_by_mail($this->input->post('email_conx'));
					
					$data = array(
							'login' => $this->input->post('email_conx'),
							'monnaie'=> $monn,
							'is_logged_in' => true,
							'cmd_data' => array()  
							);
			
					$this->session->set_userdata($data);
					redirect('compte/voir_compte');
				}else{
					$ch_error='E-mail ou Mot de passe invalide.';
				}
				
			}
			$ch_error='E-mail ou Mot de passe invalide.';
			
		}
		return $ch_error;
	}
	
	
	
	
	
	public function voir_compte(){

			$data['titre_page']= 'Mon compte';
			$data['fonction_titre']='Fiche de Mon compte';	
			$data['nom_vue_doite']= 'compte_contenu_droite.php';
			$data['nom_vue_gauche']= 'compte_contenu_gauche_moncompte.php';
			$data['fonction_affiche']= 'compte_contenu_moncompte.php';		
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
			$data['list_nouv_cmd'] = $this->Compte_model->get_list_cmd_nouv($this->session->userdata('login'),5);
			
			
			$data['page_contenu'] = $this->load->view('compte/compte_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
		
		
		
		
	}
	
	
	
	public function voir_compte_cmd(){

		
			$data['titre_page']= 'Liste des commande';
			$data['fonction_titre']='Liste des commande';	
			$data['nom_vue_doite']= 'compte_contenu_droite.php';
			$data['nom_vue_gauche']= 'compte_contenu_gauche_moncompte.php';
			$data['fonction_affiche']= 'compte_table_cmd.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
			$data['list_tt_cmd'] = $this->Compte_model->get_list_cmd($this->session->userdata('login'));
			
			
			$data['page_contenu'] = $this->load->view('compte/compte_theme',$data,TRUE);
			$this->load->view('layout',$data);
			
		
		
		
		
	}
	
	
	public function voir_compte_pers(){
			$this->voir_compte_pers_submit();
			$data['titre_page']= 'Détails du compte';
			$data['fonction_titre']='Détails du compte';	
			$data['nom_vue_doite']= 'compte_contenu_droite.php';
			$data['nom_vue_gauche']= 'compte_contenu_gauche_moncompte.php';
			$data['fonction_affiche']= 'compte_modif_compte.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
			$data['client'] = $this->Compte_model->get_client_email($this->session->userdata('login'));
					
			
			$data['page_contenu'] = $this->load->view('compte/compte_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
		
		
		
	}
	
	public function voir_compte_pers_submit(){
			
			if($this->input->post('submit_modif_compte')){
			
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('email','Email','trim|required|min_length[7]|xss_clean|valid_email');
		 $this->form_validation->set_rules('tel','Téléphone','trim|required|numeric|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('password','Mot de passe','trim|required|alpha_numeric|min_length[6]|xss_clean');
		 $this->form_validation->set_rules('password_vf','Confirmation','trim|required|alpha_numeric|min_length[6]|matches[password]|xss_clean');
		
			if ($this->form_validation->run() == TRUE and $this->client_model->exist_client_mod($this->input->post('email'),$this->input->post('id_client'))){
			
				 $client_aj['nom_client']=  $this->input->post('nom');
				 $client_aj['prenom_client']=  $this->input->post('prenom');
				 $client_aj['civil_client']=  $this->input->post('civilite');	
				 $client_aj['email_client']=  $this->input->post('email');
				 $client_aj['tel_client']=  $this->input->post('tel');
				 $client_aj['mot_pass_client']=  do_hash($this->input->post('password')); 
				 $client_aj['pays_monnaie'] = $this->input->post('tarif');
				 
				 if ($this->input->post('newsletter') == 'abonner'){
					$client_aj['newsletter_client']= TRUE;	
				 }
				 else
				 {
				 	$client_aj['newsletter_client']= FALSE;
				 }
				 	$this->client_model->update_client($this->input->post('id_client'),$client_aj);
				 	$this->session->sess_destroy();
					$monn = $this->acceuil_model->get_drap_by_mail($this->input->post('email_conx'));
					
				 	$data = array(
							'login' => $this->input->post('email'),
							'monnaie'=> $monn,
							'is_logged_in' => true
							);
			
					$this->session->set_userdata($data);
				 redirect('compte/voir_compte');
			}
			
			
		}
		
	}
	
	
	public function details_cmd(){
			
			$id_cmd = $this->uri->segment(3);
			
			$data['titre_page']= 'Détail commande';
			$data['fonction_titre']='Détails du compte';	
			$data['nom_vue_doite']= 'compte_contenu_droite.php';
			$data['nom_vue_gauche']= 'compte_contenu_gauche_moncompte.php';
			$data['fonction_affiche']= 'compte_cmd_details.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
			$cmd_details = $this->Compte_model->get_cmd_details($id_cmd);
			
			$data['cmd_details']=$cmd_details;
			$data['list_prod_cmd']= $this->Compte_model->get_cmd_prod($id_cmd);
			$data['adr_liv']= $this->Compte_model->get_adresse($cmd_details['adr_livraison_cmd']);
			$data['adr_fact']= $this->Compte_model->get_adresse($cmd_details['adr_facturation_cmd']);
					
			
			$data['page_contenu'] = $this->load->view('compte/compte_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
		
		
		
	}
	
	
	
	
	
	public function email_not_exist($email){
		
		$this->form_validation->set_message('email_not_exist','► %s est déja utilisé. Choisir un autre %s.');
		
		if ($this->client_model->exist_client($email))
		{
			return FALSE;
		}else
		{
			return TRUE;
		}
		
		
		
	}
	
	
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}
	
	
	
	
	private function dernier_achats(){
		$this->load->model('acceuil_model');
		$list_der_achat = $this->acceuil_model->dernier_achat(); 		
		return $list_der_achat;
		
	}
	
	
	
	
		
	private function affiche_categ(){
		
		$this->load->model('Categorie_model');
		$data['list_categ_a']= $this->Categorie_model->get_all_categorie_a();
		$data['list_categ_b']= $this->Categorie_model->get_all_categorie_b_noid();
		
		return $data;
	}
	
	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect ('acceuil');
	}






}
?>