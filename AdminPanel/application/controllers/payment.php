<?php

class Payment extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('Payment_model');
		$this->load->model('Client_model');
		$this->load->model('Commande_model');
		$this->load->library('pagination');
		
	}
	
	
	public function index(){
		
		$this->transaction();
		
	}
	
	
	
	public function transaction(){
		
			$data['fonction_titre']='Tous les transactions';	
			$data['titre_page']= 'Tous les transactions';
			$data['titre_interne']= 'Tous les transactions';
			$data['nom_vue']= 'pay_trans.php';
			
			
			$config['base_url'] = base_url().'payment/transaction';
			$config['total_rows'] = $this->db->get('transaction')->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['trans_list']= $this->db->get('transaction', $config['per_page'], $this->uri->segment(3,0));
			
			$data['page_contenu'] = $this->load->view('payment/pay_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
	}
	
	
	public function voir_trans(){
			
			$id_trans = $this->uri->segment(3);
			
			$data['fonction_titre']='Fiche de transaction';	
			$data['titre_page']= 'Fiche de transaction';
			$data['titre_interne']= 'Fiche de transaction';
			$data['nom_vue']= 'pay_voir.php';
			$trans = $this->Payment_model->get_trans($id_trans);
			$data['trans'] = $trans;
			$cmd = $this->Commande_model->get_cmd($trans['cmd_trans']);
			$data['cli'] = $this->Client_model->get_client($cmd['client_cmd']);
			
			
			
			$data['page_contenu'] = $this->load->view('payment/pay_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
	}
	
	
	public function supprimer_trans(){
			
			$id_trans = $this->uri->segment(3);
			
			$data['fonction_titre']='Supprimer de transaction';	
			$data['titre_page']= 'Supprimer de transaction';
			$data['titre_interne']= 'Supprimer de transaction';
			$data['nom_vue']= 'pay_supprimer.php';
			
			
			
				if ($this->input->post('valider'))
			{	
				$this->Payment_model->drop_trans($this->input->post('id_trans'));
				redirect($this->index());
			}	
				
			
			
			$data['page_contenu'] = $this->load->view('payment/pay_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
	}
	
	
	public function transaction_conf(){
		
			$data['fonction_titre']='Transactions des commandes confirmées';	
			$data['titre_page']= 'Transactions des commandes confirmées';
			$data['titre_interne']= 'Transactions des commandes confirmées';
			$data['nom_vue']= 'pay_trans.php';
			
			
			$config['base_url'] = base_url().'payment/transaction';
			$config['total_rows'] = $this->Payment_model-> get_trans_conf_nolimit()->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			
			$data['trans_list']= $this->Payment_model->get_trans_conf($config['per_page'],$this->uri->segment(3,0));
			
			$data['page_contenu'] = $this->load->view('payment/pay_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
	}
	
	public function transaction_att(){
		
			$data['fonction_titre']='Transactions des commandes en attentes';	
			$data['titre_page']= 'Transactions des commandes en attentes';
			$data['titre_interne']= 'Transactions des commandes en attentes';
			$data['nom_vue']= 'pay_trans.php';
			
			
			$config['base_url'] = base_url().'payment/transaction';
			$config['total_rows'] = $this->Payment_model-> get_trans_att_nolimit()->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			
			$data['trans_list']= $this->Payment_model->get_trans_att($config['per_page'],$this->uri->segment(3,0));
			
			$data['page_contenu'] = $this->load->view('payment/pay_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
	}
	
	public function transaction_ann(){
		
			$data['fonction_titre']='Transactions des commandes annulées';	
			$data['titre_page']= 'Transactions des commandes annulées';
			$data['titre_interne']= 'Transactions des commandes annulées';
			$data['nom_vue']= 'pay_trans.php';
			
			
			$config['base_url'] = base_url().'payment/transaction';
			$config['total_rows'] = $this->Payment_model-> get_trans_ann_nolimit()->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			
			$data['trans_list']= $this->Payment_model->get_trans_ann($config['per_page'],$this->uri->segment(3,0));
			
			$data['page_contenu'] = $this->load->view('payment/pay_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
	}
	
	public function meth_pay(){
		
			$data['fonction_titre']='Méthodes de paiement';	
			$data['titre_page']= 'Méthodes de paiement';
			$data['titre_interne']= 'Méthodes de paiement';
			$data['nom_vue']= 'pay_type.php';
			
			$data['page_contenu'] = $this->load->view('payment/pay_theme',$data,TRUE);
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