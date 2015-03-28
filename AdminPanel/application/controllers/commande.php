<?php

class Commande extends CI_Controller {
	
	
	
	function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('commande_model');
		$this->load->library('pagination');
		$this->load->model('client_model');
	}
	
	public function index(){
		
		$this->list_commande();
	}
	
	
	public function list_commande(){
		
			$data['fonction_titre']='Tous les commandes';	
			$data['titre_page']= 'Tous les commandes';
			$data['titre_interne']= 'Tous les commandes';
			$data['nom_vue']= 'cmd_list.php';
			
			
			$config['base_url'] = base_url().'commande/list_commande';
			$config['total_rows'] = $this->db->get('commandes')->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['cmd_list']= $this->db->get('commandes', $config['per_page'], $this->uri->segment(3));
			
			$data['page_contenu'] = $this->load->view('commande/cmd_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
		
	}


	public function list_commande_livred(){
		
			$data['fonction_titre']='Commandes Livrés';	
			$data['titre_page']= 'Commandes Livrés';
			$data['titre_interne']= 'Commandes Livrés';
			$data['nom_vue']= 'cmd_list.php';
			
			
			$config['base_url'] = base_url().'commande/list_commande';
			$config['total_rows'] = $this->db->get_where('commandes',array('statut_cmd' => 'Livré'))->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['cmd_list']= $this->db->get_where('commandes',array('statut_cmd' => 'Livré'), $config['per_page'], $this->uri->segment(3));
			
			$data['page_contenu'] = $this->load->view('commande/cmd_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
		
	}
	
	public function list_commande_wait(){
		
			$data['fonction_titre']='Commandes En Attente';	
			$data['titre_page']= 'Commandes En Attente';
			$data['titre_interne']= 'Commandes En Attente';
			$data['nom_vue']= 'cmd_list.php';
			
			
			$config['base_url'] = base_url().'commande/list_commande';
			$config['total_rows'] = $this->db->get_where('commandes',array('statut_cmd' => 'En Attente'))->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['cmd_list']= $this->db->get_where('commandes',array('statut_cmd' => 'En Attente'), $config['per_page'], $this->uri->segment(3));
			
			$data['page_contenu'] = $this->load->view('commande/cmd_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
		
	}
	
	
	public function list_commande_Cancelled(){
		
			$data['fonction_titre']='Commandes Annulés';	
			$data['titre_page']= 'Commandes Annulés';
			$data['titre_interne']= 'Commandes Annulés';
			$data['nom_vue']= 'cmd_list.php';
			
			
			$config['base_url'] = base_url().'commande/list_commande';
			$config['total_rows'] = $this->db->get_where('commandes',array('statut_cmd' => 'Annulé'))->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['cmd_list']= $this->db->get_where('commandes',array('statut_cmd' => 'Annulé'), $config['per_page'], $this->uri->segment(3));
			
			$data['page_contenu'] = $this->load->view('commande/cmd_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
		
	}
	
	
	public function commande_edit(){
		
			$id_cmd = $this->uri->segment(3);
					
			$data['fonction_titre']='Modifier Commande';	
			$data['titre_page']= 'Modifier Commande';
			$data['titre_interne']= 'Modifier Commande';
			$data['nom_vue']= 'cmd_edit.php';
			
			$this->load->model('adresse_model');
			$this->load->model('categorie_model');
			
			$cmd_tr = $this->commande_model->get_cmd($id_cmd);
			$cli_tr = $this->client_model->get_client($cmd_tr['client_cmd']);
			$data['adr_liv'] = $this->adresse_model->get_adresse($cmd_tr['adr_livraison_cmd']);
			$data['adr_fact'] = $this->adresse_model->get_adresse($cmd_tr['adr_facturation_cmd']);
			$data['cmd_tr']= $cmd_tr;
			$data['cli_tr'] = $cli_tr;
			$data['list_cmd_act'] = $this->commande_model->get_cmd_action($id_cmd);
			$data['list_cmd_prod'] = $this->commande_model->get_cmd_prod($id_cmd);

			$data['page_contenu'] = $this->load->view('commande/cmd_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
		
	}
	
	public function commande_edit_submit(){
		
		$id_cmd = $this->input->post('id_cmd');
		$cmd_tr = $this->commande_model->get_cmd($id_cmd);
		
		if ($this->input->post('valider')){
				if ($this->input->post('statut_cmd') != ' ' and $this->input->post('statut_cmd') != $cmd_tr['statut_cmd']){
					
					
					if($this->input->post('comment')){
						$comment = $this->input->post('comment');
						
					}else{
						$comment = '';
					}
					
					if($this->input->post('avertis') == 'oui'){
						$avertis = TRUE;
					}else{
						$avertis = FALSE;
					}
					if($this->input->post('statut_cmd')== 'Livré'){
						$this->load->model('Produit_model');
						$this->Produit_model->update_quantite_cmd($id_cmd);
					}
					$this->commande_model->update_cmd_statut($id_cmd ,$this->input->post('statut_cmd'),$avertis,$comment);
				}
				redirect('commande/commande_edit/'.$id_cmd);
			}
	}


public function commande_voir(){
		
			$id_cmd = $this->uri->segment(3);
					
			$data['fonction_titre']='Fiche de Commande';	
			$data['titre_page']= 'Fiche de Commande';
			$data['titre_interne']= 'Fiche de Commande';
			$data['nom_vue']= 'cmd_voir.php';
			
			$this->load->model('adresse_model');
			$this->load->model('categorie_model');
			
			$cmd_tr = $this->commande_model->get_cmd($id_cmd);
			$cli_tr = $this->client_model->get_client($cmd_tr['client_cmd']);
			$data['adr_liv'] = $this->adresse_model->get_adresse($cmd_tr['adr_livraison_cmd']);
			$data['adr_fact'] = $this->adresse_model->get_adresse($cmd_tr['adr_facturation_cmd']);
			$data['cmd_tr']= $cmd_tr;
			$data['cli_tr'] = $cli_tr;
			$data['list_cmd_act'] = $this->commande_model->get_cmd_action($id_cmd);
			$data['list_cmd_prod'] = $this->commande_model->get_cmd_prod($id_cmd);
						
			
			$data['page_contenu'] = $this->load->view('commande/cmd_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
		
	}
	

public function commande_supprimer(){
		
			$id_cmd = $this->uri->segment(3);
					
			$data['fonction_titre']='Supprimer de Commande';	
			$data['titre_page']= 'Supprimer de Commande';
			$data['titre_interne']= 'Supprimer de Commande';
			$data['nom_vue']= 'cmd_supprimer.php';
			
			$cmd_tr = $this->commande_model->get_cmd($id_cmd);
			
			$data['cmd_tr']= $cmd_tr;
			
			if ($this->input->post('valider'))
			{	
				$this->commande_model->drop_cmd_commande($this->input->post('id_cmd'));
				$this->commande_model->drop_cmd_action($this->input->post('id_cmd'));
				redirect('commande');
			}	
						
			
			$data['page_contenu'] = $this->load->view('commande/cmd_theme',$data,TRUE);
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