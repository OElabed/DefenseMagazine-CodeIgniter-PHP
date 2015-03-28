<?php 

class Client extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	
	
	
	public function index(){	
		
		$this->list_client();
		
	}
	
	public function list_client(){
		
		$data['titre_page']= 'List des clients';
		$data['titre_interne']= 'List des clients';
		$this->load->model('client_model');
		
		
		$this->load->library('pagination');
			
			$config['base_url'] = base_url().'client/list_client';
			$config['total_rows'] = $this->db->get('client')->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['clts_list']= $this->db->get('client', $config['per_page'], $this->uri->segment(3));
		
		
		/*$data['clts_list'] = $this->client_model->get_all_client();*/
		$data['page_contenu'] = $this->load->view('client/clients_list',$data,TRUE);
		$this->load->view('layout_admin',$data);
	}
	
	
	
	public function ajouter_client(){
		$data['titre_page']= 'Ajout client';
		$data['titre_interne']= 'Ajouter un client';

		$this->ajouter_submit();		
		$data['page_contenu'] = $this->load->view('client/clients_ajout',$data,TRUE);
		$this->load->view('layout_admin',$data);
		
		
	}
	
	private function ajouter_submit(){
				
		if ($this->input->post('valider'))
		{		
		
		
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('email','Email','trim|required|min_length[7]|xss_clean|valid_email|callback_email_not_exist');
		 $this->form_validation->set_rules('tel','Téléphone','trim|required|numeric|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('password','Mot de passe','trim|required|alpha_numeric|min_length[6]|xss_clean');
		 $this->form_validation->set_rules('password_vf','Confirmation','trim|required|alpha_numeric|min_length[6]|matches[password]|xss_clean');
		
		if ($this->form_validation->run() == TRUE){
		
		
		
			 $this->load->model('client_model');
			 
			  
			 $client_aj['nom_client']=  $this->input->post('nom');
			 $client_aj['prenom_client']=  $this->input->post('prenom');
			 $client_aj['civil_client']=  $this->input->post('civilite');	
			 $client_aj['email_client']=  $this->input->post('email');
			 $client_aj['tel_client']=  $this->input->post('tel');
			 $client_aj['mot_pass_client']=  do_hash($this->input->post('password')); 
				 
				 if ($this->input->post('newsletter')){
					$client_aj['newsletter_client']= TRUE;	
				 }
				 else
				 {
				 	$client_aj['newsletter_client']= FALSE;
				 }
				 $this->client_model->ajouter_client($client_aj);
				 redirect('Client');
			}
		}
	}
	
	public function email_not_exist($email){
		
		$this->load->model('client_model');
		$this->form_validation->set_message('email_not_exist','► %s est déja utilisé. Choisir un autre %s.');
		
		if ($this->client_model->exist_client($email))
		{
			return FALSE;
		}else
		{
			return TRUE;
		}
		
		
		
	}
	
	public function voir_client(){
		$data['titre_page']= 'Voir Client';
		$data['titre_interne']= 'Fiche de client';
		$this->load->model('client_model');
		
		$id_client = $this->uri->segment(3);
		$client_tr = $this->client_model->get_client($id_client);
		
			if ($client_tr['newsletter_client'] == 1)
			{
				
				$str_catego = "<td width=\"30%\"><strong>Oui</strong>, est abonné à newsletter .</td>
								<td></td>";			
			}
			else
			{
				$str_catego = "<td width=\"100%\"><strong>Non</strong>, n'est pas abonné à newsletter.</td>
	                           <td></td>";
			}
		
		$data['str_catego'] = $str_catego;
		$data['client'] = $client_tr;
		
		
		$data['page_contenu'] = $this->load->view('client/client_voir',$data,TRUE);
		$this->load->view('layout_admin',$data);
		
		
		
	}
	
	public function editer_client(){
	
	
		$data['titre_page']= 'Editer Client';
		$data['titre_interne']= 'Editer client';
		
		$this->load->model('client_model');
		
		$id_client = $this->uri->segment(3);
		
		$client_tr = $this->client_model->get_client($id_client);
		
		
		if ($client_tr['newsletter_client'] == 1){
			$data['str_news'] = '<input type="checkbox" name="newsletter" checked="checked" value="oui" />s\'abonner à la newsletterbox';
		}
		else
		{
			$data['str_news'] = '<input type="checkbox" name="newsletter" value="oui" />s\'abonner à la newsletterbox';
		}
		$data['client'] = $client_tr;
		
		$data['page_contenu'] = $this->load->view('client/client_editer',$data,TRUE);
		$this->load->view('layout_admin',$data);
	}
	
	public function editer_submit(){
		
		if ($this->input->post('valider'))
		{	
		
		 $id_client_tr = $this->input->post('id_client');
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('email','Email','trim|required|min_length[7]|xss_clean|valid_email');
		 $this->form_validation->set_rules('tel','Téléphone','trim|required|numeric|min_length[3]|xss_clean');
		
		if ($this->form_validation->run() == TRUE){
				
			 $this->load->model('client_model');
			 
						 
			 $client_aj['nom_client']=  $this->input->post('nom');
			 $client_aj['prenom_client']=  $this->input->post('prenom');
			 $client_aj['civil_client']=  $this->input->post('civilite');	
			 $client_aj['email_client']=  $this->input->post('email');
			 $client_aj['tel_client']=  $this->input->post('tel');
				 $check_catego = FALSE;
				 if ($this->input->post('newsletter') == 'oui'){
					$client_aj['newsletter_client']= TRUE;
				 }
				 else
				 {
				 	$client_aj['newsletter_client']= FALSE;
				 }
				 $this->client_model->update_client($id_client_tr,$client_aj);
				 redirect('Client');
			}
			else 
			{	
				$data['civilite_tr'] = $this->input->post('civilite');
				$data['news_client']='';
				if ($this->input->post('newsletter') == 'oui'){
					$data['str_news'] = '<input type="checkbox" name="newsletter" checked="checked" value="oui" />s\'abonner à la newsletterbox';
				 }
				 else
				 {
				 	$data['str_news'] = '<input type="checkbox" name="newsletter" value="oui" />s\'abonner à la newsletterbox';
				 }
				
				
				$data['titre_page']= 'Editer Client';
				$data['titre_interne']= 'Editer client';
				$data['id_client']= $id_client_tr;
				$data['page_contenu'] = $this->load->view('client/client_edit_submit',$data,TRUE);
				$this->load->view('layout_admin',$data);
			}
		}
		else
		{
			redirect('client');
		}
		
		
	}

	public function supprimer_client(){
		$data['titre_page']= 'Supprimer Client';
		$data['titre_interne']= 'Valider suppression';
		$id_client = $this->uri->segment(3);
		$this->load->model('client_model');
		$client_tr = $this->client_model->get_client($id_client);
		$data['client_sp']= $client_tr;
		if ($this->input->post('valider'))
		{	
			$this->client_model->drop_client($this->input->post('id_client'));
			redirect('client');
		}
		
		
		$data['page_contenu'] = $this->load->view('client/client_supprimer',$data,TRUE);
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