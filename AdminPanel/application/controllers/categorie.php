<?php 

class Categorie extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	
	
	
	public function index(){	
			$data['titre_page']= 'Tous les catégories';
			$data['titre_interne']= 'Tous les catégories';
			$this->load->model('categorie_model');
			$categ_a_list= $this->categorie_model->get_all_categorie_a();
			$data['categ_a_list']= $categ_a_list;
			
			foreach($categ_a_list as $row){
				$categ_b_list[$row->id_categorie]= $this->categorie_model->get_all_categorie_b($row->id_categorie);
			}
			$data['categ_b_list'] = $categ_b_list;
			$data['page_contenu'] = $this->load->view('categorie/categorie_list',$data,TRUE);
			$this->load->view('layout_admin',$data);
			
		}
	
	public function get_categorie_b($id){	
		$this->load->model('categorie_model');
		$data['categ_b_list']= $this->categorie_model->get_all_categorie_b($id);
		$this->load->view('categorie/categorie_b',$data);
	
	}
	
	public function Voir_categorie(){	
			$data['titre_page']= 'Voir Catégorie';
			$data['titre_interne']= 'Fiche de catégorie';
			$char_catego = $this->uri->segment(3);
			$pieces = explode(":", $char_catego);
			$id_catego = $pieces[0];
			$type_categ = $pieces[1];
			
			$this->load->model('categorie_model');
			if ($type_categ == 'p'){
				$data['categ_data']= $this->categorie_model->get_categorie_a($id_catego);	
			}
			elseif ($type_categ == 's')
			{
				$data['categ_data']= $this->categorie_model->get_categorie_b($id_catego);
			}			
			
			$data['page_contenu'] = $this->load->view('categorie/categorie_voir',$data,TRUE);
			$this->load->view('layout_admin',$data);
	
	}
	
	public function Ajouter_categorie(){	
			$data['titre_page']= 'Ajouter Catégorie';
			$data['titre_interne']= 'Ajouter Catégorie';
			$this->load->library('ajax');
			
			$data['categorie_view'] = $this->load->view('categorie/categorie_ajout_acceuil',$data,TRUE);
			$data['page_contenu'] = $this->load->view('categorie/categorie_ajout',$data,TRUE);
			$this->load->view('layout_admin',$data);
	
	}
	
	public function Ajouter_categorie_a(){
		$data['titre_page']= 'Ajouter Catégorie';
		$data['titre_interne']= 'Ajouter Catégorie';	
		
		
		$this->load->model('categorie_model');		
		
		$this->ajouter_categorie_a_submit();
		
		$data['categorie_view'] = $this->load->view('categorie/categorie_ajout_a',$data,TRUE);
		$data['page_contenu'] = $this->load->view('categorie/categorie_ajout',$data,TRUE);
		$this->load->view('layout_admin',$data);
		
	}
	
	
	
	public function Ajouter_categorie_a_submit(){	
		
		
		if ($this->input->post('valider'))
		{		
		 $this->form_validation->set_rules('nom','Nom','trim|required|min_length[3]|max_length[50]|xss_clean|callback_categorie_a_not_exist');
		 if ($this->form_validation->run() == TRUE){
		 
		 	$nom =  $this->input->post('nom');
			$this->categorie_model->ajout_categorie_a($nom);
			redirect('categorie');
		 	
		 }
		 }
				
		
	}
	
	
	public function categorie_a_not_exist($catego){
		
		$this->load->model('categorie_model');
		$this->form_validation->set_message('categorie_a_not_exist','► %s est déja utilisé. Choisir un autre %s.');
		
		if ($this->categorie_model->exist_categorie_a($catego))
		{
			return FALSE;
		}else
		{
			return TRUE;
		}
		
	}
	
	
	
	public function categorie_b_not_exist($catego){
		
		$this->load->model('categorie_model');
		$this->form_validation->set_message('categorie_b_not_exist','%s est déja utilisé. Choisir un autre %s.');
		
		if ($this->categorie_model->exist_categorie_b($catego))
		{
			return FALSE;
		}else
		{
			return TRUE;
		}
		
	}
	
	
	
	
	public function Ajouter_categorie_b(){
		$data['titre_page']= 'Ajouter Catégorie';
		$data['titre_interne']= 'Ajouter Catégorie';
		$this->load->model('categorie_model');	
		$data['categ_a_list']= $this->categorie_model->get_all_categorie_a();
		
		
				
		
		$this->ajouter_categorie_b_submit();
		
		$data['categorie_view'] = $this->load->view('categorie/categorie_ajout_b',$data,TRUE);
		$data['page_contenu'] = $this->load->view('categorie/categorie_ajout',$data,TRUE);
		$this->load->view('layout_admin',$data);
		
	}
	
	
	
	public function Ajouter_categorie_b_submit(){	
		
		
		if ($this->input->post('valider'))
		{		
		 $this->form_validation->set_rules('nom','Nom','trim|required|min_length[3]|max_length[50]|xss_clean|callback_categorie_b_not_exist');
		 if ($this->form_validation->run() == TRUE){
		 
		 	$nom =  $this->input->post('nom');
			$categ_pere = $this->input->post('catego_pere');
			$this->categorie_model->ajout_categorie_b($nom,$categ_pere);
			redirect('categorie');
		 	
		 }
		 }
				
		
	}
	
	
	public function editer_categorie(){
		
		    $data['titre_page']= 'Modifier Catégorie';
			$data['titre_interne']= 'Modifier Catégorie';
			$char_catego = $this->uri->segment(3);
			
			$pieces = explode(":", $char_catego);
			$id_catego = $pieces[0];
			$type_categ = $pieces[1];
			
			$this->load->model('categorie_model');
			if ($type_categ == 'p'){
				
				$categ_data = $this->categorie_model->get_categorie_a($id_catego);
				$data['categ_data']= $this->categorie_model->get_categorie_a($id_catego);
				$data['champ_nom'] = $categ_data['nom_catego'];
				$data['categorie_view'] = $this->load->view('categorie/categorie_editer_a',$data,TRUE);	
			}
			elseif ($type_categ == 's')
			{
				$categ_data = $this->categorie_model->get_categorie_b($id_catego);
				$data['categ_data']= $this->categorie_model->get_categorie_b($id_catego);
				$data['champ_nom'] = $categ_data['nom_catego'];
				$data['categorie_view'] = $this->load->view('categorie/categorie_editer_b',$data,TRUE);
			}			
			
			
			$data['page_contenu'] = $this->load->view('categorie/categorie_ajout',$data,TRUE);
			$this->load->view('layout_admin',$data);
	}
	
	
	public function editer_categorie_submit(){
			
			$data['titre_page']= 'Modifier Catégorie';
			$data['titre_interne']= 'Modifier Catégorie';
			$char_catego = $this->uri->segment(3);
			$pieces = explode(":", $char_catego);
			$id_catego = $pieces[0];
			$type_categ = $pieces[1];
			if ($this->input->post('valider'))
		{
			$this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
			$this->load->model('categorie_model');
			if ($this->form_validation->run() == TRUE){
			
				if ($type_categ == 'p'){
					$this->categorie_model->update_categorie_a($id_catego,$this->input->post('nom'));
					redirect('categorie');	
				}
				elseif ($type_categ == 's')
				{
					$this->categorie_model->update_categorie_b($id_catego,$this->input->post('catego_pere'),$this->input->post('nom'));
					redirect('categorie');
				}
				
			}
			else{	
				if ($type_categ == 'p')
					{
					$categ_data = $this->categorie_model->get_categorie_a($id_catego);
					$data['categ_data']= $this->categorie_model->get_categorie_a($id_catego);
					$data['champ_nom'] = set_value();
					$data['categorie_view'] = $this->load->view('categorie/categorie_editer_a',$data,TRUE);
					}
				elseif ($type_categ == 's')
					{
					$categ_data = $this->categorie_model->get_categorie_b($id_catego);
					$data['categ_data']= $this->categorie_model->get_categorie_b($id_catego);
					$data['champ_nom'] = set_value();
					$data['categorie_view'] = $this->load->view('categorie/categorie_editer_b',$data,TRUE);
					}
					$data['page_contenu'] = $this->load->view('categorie/categorie_ajout',$data,TRUE);
					$this->load->view('layout_admin',$data);					
				}
				
		}	
	}
	
	
	public function supprimer_categorie() {
		$data['titre_page']= 'Supprimer Catégorie';
		$data['titre_interne']= 'Supprimer Catégorie';
		$char_catego = $this->uri->segment(3);
		
		$pieces = explode(":", $char_catego);
		$id_catego = $pieces[0];
		$type_categ = $pieces[1];
		
		$this->load->model('categorie_model');
		if ($type_categ == 'p' ){
			$data['catego_sp']= $this->categorie_model->get_categorie_a($id_catego);
			$data['type'] = 'catégorie';
		}elseif ($type_categ == 's'){
			$data['catego_sp']= $this->categorie_model->get_categorie_b($id_catego);
			$data['type'] = 'sous-catégorie';
		}
		
		if ($this->input->post('valider'))
		{	
			if ($type_categ == 'p' ){
				$this->categorie_model->drop_categorie_a($id_catego);
				redirect('categorie');
			}elseif ($type_categ == 's'){
				$this->categorie_model->drop_categorie_b($id_catego);
				redirect('categorie');
			}
		}
		$data['page_contenu'] = $this->load->view('categorie/categorie_supprimer',$data,TRUE);
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