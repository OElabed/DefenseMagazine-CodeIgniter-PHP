<?php

class Login extends CI_Controller {


	public function index(){
		
		$data['titre']='Bienvenue sur le T.Bord';
		$data['page_contenu'] = $this->load->view('login/login_form',$data,TRUE);
		$this->load->view('login/login_template',$data);
		
	}
	
	public function validation(){
		$this->load->model('login_model');
		$query = $this->login_model->validate();
		
		if ($query)
		{
			$data = array(
							'login' => $this->input->post('login'),
							'is_logged_in' => true  
							);
			
			$this->session->set_userdata($data);
			redirect('tab_bord');
		}
		else
		{
			$this->index();
		}
	}
	
	public function pass_oublie(){
		$this->load->model('login_model');
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('email','Email','trim|required|min_length[7]|xss_clean|valid_email|callback_email_not_exist');
			
			if ($this->form_validation->run() == TRUE){
				
				$member = $this->login_model->get_admin($this->input->post('email'));
				$this->load->library('email');
				
				$this->email->set_newline("\r\n");
				$this->email->from('defense_magazine@gmail.com','Administrateur');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Mot de pass oublié');
				$this->email->message('Bonjour Mr(Me) '.$member['username'].' , le mot de pass est '.$member['pass']);
				
				if($this->email->send()){
					redirect($this->index());
				}
			}
		}
		
		$data['titre']='Bienvenue sur le T.Bord';
		$data['page_contenu'] = $this->load->view('login/login_oublie',$data,TRUE);
		$this->load->view('login/login_template',$data);
	}
	
	
	public function email_not_exist($email){
		
		$this->load->model('login_model');
		$this->form_validation->set_message('email_not_exist','► %s n\'est pas trouver.');
		
		if ($this->login_model->exist_admin($email))
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
		
		
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}





}





?>