<?php 

class Produit extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	
	
	
	public function index(){
		
		$this->list_produit();
	}
	
	
	public function list_produit(){	
			$data['fonction_titre']='List des Produits';	
			$data['titre_page']= 'List des Produits';
			$data['titre_interne']= 'List des Produits';
			$data['nom_vue']= 'list_produit.php';
			
			$this->load->model('produit_model');
			$this->load->model('categorie_model');
			$this->load->library('pagination');
			
			$config['base_url'] = base_url().'produit/list_produit';
			$config['total_rows'] = $this->db->get('produit')->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 20;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			
			$this->pagination->initialize($config);
			$data['prod_list']= $this->db->get('produit', $config['per_page'], $this->uri->segment(3));
			
			
			$data['page_contenu'] = $this->load->view('produit/produit_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
			
			
		}
	
	
	public function ajout_produit(){
			$data['fonction_titre']='Ajouter Produit';	
			$data['titre_page']= 'Ajouter Produit';
			$data['titre_interne']= 'Ajouter Produit';
			$data['nom_vue']= 'table_ajout.php';
			
			$this->load->model('categorie_model');
			$this->load->model('tof_model');
			$data['catego_a_list']= $this->categorie_model->get_all_categorie_a();		
			$data['catego_b_list']= $this->categorie_model->get_all_categorie_b_noid();		
			
			$ch3="";
			$data['ch3']=$ch3;			
			$ch4="";
			$data['ch4']=$ch4;
			$ch5="";
			$data['ch5']=$ch5;
			if ($this->input->post('valider')){
				
			
			/***1**/
			$this->form_validation->set_rules('titre','Titre','trim|required|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('resum','Resumé','trim|required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('sommaire','Sommaire','trim|required|min_length[3]|xss_clean');
			/**2**/
		 	$this->form_validation->set_rules('editeur','Editeur','trim|required|min_length[3]|max_length[50]|xss_clean');
		 	$this->form_validation->set_rules('ISBN','ISBN','trim|required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('date_paru','Date de parution','trim|required|xss_clean|callback_valid_date');
		    $this->form_validation->set_rules('nb_page','Nbre de pages','trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('poids','Poids','trim|required|numeric|xss_clean');
			/****3****/
			$f3=TRUE;
			$image_result = $this->tof_model->upload_image('image');
			if ($image_result['format_image'] == FALSE){
				$f3=FALSE;
				$ch3="► Format de l'image ou Lien INVALIDE.";
			}
			$data['ch3']=$ch3;
			//$this->form_validation->set_rules('image','Url d\'image','trim|required|xss_clean');
			/****4****/
			$f4=TRUE;
			
			if (!$this->input->post('categ_a')){
				$f4=FALSE;
				$ch4 = "► Choisie un catégorie";
			}
			if ($this->input->post($this->input->post('categ_a')) == ' '){
				$f4=FALSE;
				$ch4 = "► Choisie un sous-catégorie";
			}
			$data['ch4']=$ch4;
			/****5****/
			$this->form_validation->set_rules('quantite','Quantité','trim|required|numeric|xss_clean');
			$f5=TRUE;
			
			if (!$this->input->post('etat')){
				$f5=FALSE;
				$ch5 = "► Choisie un état";
			}
			$data['ch5']=$ch5;
			/****6***/
			$this->form_validation->set_rules('prix','Prix','trim|required|decimal|xss_clean');
			}
			/****/
			
			
			
			if ($this->form_validation->run() == TRUE and $f4==TRUE and $f5==TRUE and $f3==TRUE ){
				
				$this->load->model('produit_model');
				
				/***1****/
				$prod['titre_produit']=$this->input->post('titre');
				$prod['resum_produit']=$this->input->post('resum');
				$prod['sommaire_produit']=$this->input->post('sommaire');
				/****2****/
				$prod['editeur_produit']=$this->input->post('editeur');
				$prod['ISBN_produit']=$this->input->post('ISBN');
				
				$date =$this->input->post('date_paru');
				$date = explode('/',$date);				
				$prod['Date_parution_produit']= $date[2].'-'.$date[1].'-'.$date[0];
				
				$prod['nbre_page_produit']=$this->input->post('nb_page');
				$prod['poids_produit']=$this->input->post('poids');
				/****3***/
				
				$prod['id_tof_produit']= $image_result['id_tof'];
					
				/***4***/
				$prod['categorie_produit'] = $this->input->post($this->input->post('categ_a'));
				/****5**/
				$prod['quantite_produit']=$this->input->post('quantite');
				if($this->input->post('etat') == 'vendre'){
					$prod['diponible']= TRUE;
				}else{
					$prod['diponible']= FALSE;
				}
				/*****6****/
				$prod['prix_uni_produit']=$this->input->post('prix');
				
				$this->produit_model->ajout_produit($prod);
				redirect('produit');
				
			}
			
			
			
			
			
				
			$data['page_contenu'] = $this->load->view('produit/produit_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
	
	}

	
	public function edit_produit(){
			
			$id_prod= $this->uri->segment(3);
			
			
			
			$data['fonction_titre']='Editer Produit';	
			$data['titre_page']= 'Editer Produit';
			$data['titre_interne']= 'Editer Produit';
			$data['nom_vue']= 'table_edit.php';
			
			$this->load->model('produit_model');
			$this->load->model('categorie_model');
			$this->load->model('tof_model');
			$produit_tr = $this->produit_model->get_produit_id($id_prod);
			$data['produit_tr'] = $produit_tr;
			$data['catego_a_list']= $this->categorie_model->get_all_categorie_a();
			$data['catego_b_list']= $this->categorie_model->get_all_categorie_b_noid();		
			
			$data['img_prod']= $this->tof_model->get_img($produit_tr['id_tof_produit']);
			
			$data['categ'] = $this->categorie_model->get_categorie_b($produit_tr['categorie_produit']);			
			
				
			$data['page_contenu'] = $this->load->view('produit/produit_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
	
	}
	
		
	public function edit_submit(){
		
		$id_prod = $this->uri->segment(3);
		
		$this->load->model('produit_model');
		$this->load->model('categorie_model');
		$this->load->model('tof_model');
		
		
		$prod = $this->produit_model->get_produit_id($id_prod);
		
		
		
			$ch3="";
			$data['ch3']=$ch3;			
			$ch4="";
			$data['ch4']=$ch4;
			$ch5="";
			$data['ch5']=$ch5;
			if ($this->input->post('valider')){
				
			
			/***1**/
			$this->form_validation->set_rules('titre','Titre','trim|required|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('resum','Resumé','trim|required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('sommaire','Sommaire','trim|required|min_length[3]|xss_clean');
			/**2**/
		 	$this->form_validation->set_rules('editeur','Editeur','trim|required|min_length[3]|max_length[50]|xss_clean');
		 	$this->form_validation->set_rules('ISBN','ISBN','trim|required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('date_paru','Date de parution','trim|required|xss_clean|callback_valid_date');
		    $this->form_validation->set_rules('nb_page','Nbre de pages','trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('poids','Poids','trim|required|numeric|xss_clean');
			/****3****/
			$f3=TRUE;
			if($this->input->post('mod_img') == 'faire' ){
				$id_img = $this->tof_model->get_id_img($prod['id_tof_produit']);
				$image_result = $this->tof_model->upload_image('image');
				if ($image_result['format_image'] == FALSE){
					$f3=FALSE;
					$ch3="► Format de l'image ou Lien invalide.";
				}
				$data['ch3']=$ch3;
			}
			
			/****4****/
			$f4=TRUE;
			
			if (!$this->input->post('categ_a')){
				$f4=FALSE;
				$ch4 = "► Choisie un catégorie";
			}
			if ($this->input->post($this->input->post('categ_a')) == ' '){
				$f4=FALSE;
				$ch4 = "► Choisie un sous-catégorie";
			}
			$data['ch4']=$ch4;
			/****5****/
			$this->form_validation->set_rules('quantite','Quantité','trim|required|numeric|xss_clean');
			$f5=TRUE;
			
			if (!$this->input->post('etat')){
				$f5=FALSE;
				$ch5 = "► Choisie un état";
			}
			$data['ch5']=$ch5;
			/****6***/
			$this->form_validation->set_rules('prix','Prix','trim|required|decimal|xss_clean');
			
			/****/
			
			
			
			
			
			
			
			if ($this->form_validation->run() == TRUE and $f4==TRUE and $f5==TRUE and $f3==TRUE ){
				
				
				
				/***1****/
				$prod['titre_produit']=$this->input->post('titre');
				$prod['resum_produit']=$this->input->post('resum');
				$prod['sommaire_produit']=$this->input->post('sommaire');
				/****2****/
				$prod['editeur_produit']=$this->input->post('editeur');
				$prod['ISBN_produit']=$this->input->post('ISBN');
				
				$date =$this->input->post('date_paru');
				$date = explode('/',$date);				
				$prod['Date_parution_produit']= $date[2].'-'.$date[1].'-'.$date[0];
				
				$prod['nbre_page_produit']=$this->input->post('nb_page');
				$prod['poids_produit']=$this->input->post('poids');
				/****3***/
				if($this->input->post('mod_img') == 'faire'){
					$mod_img = TRUE;
					$prod['id_tof_produit']= $image_result['id_tof'];
				}
				else{
					$mod_img = FALSE;
				}
				/***4***/
				$prod['categorie_produit'] = $this->input->post($this->input->post('categ_a'));
				/****5**/
				$prod['quantite_produit']=$this->input->post('quantite');
				if($this->input->post('etat') == 'vendre'){
					$prod['diponible']= TRUE;
				}else{
					$prod['diponible']= FALSE;
				}
				/*****6****/
				$prod['prix_uni_produit']=$this->input->post('prix');
				
				$this->produit_model->update_produit($id_prod,$prod,$mod_img);
				redirect('Produit');
				
			}else
			{
				
			$data['fonction_titre']='Editer Produit';	
			$data['titre_page']= 'Editer Produit';
			$data['titre_interne']= 'Editer Produit';
			$data['nom_vue']= 'table_edit_submit.php';
				
			$data['catego_a_list']= $this->categorie_model->get_all_categorie_a();
			$data['catego_b_list']= $this->categorie_model->get_all_categorie_b_noid();		
			
			$data['img_prod']= $this->tof_model->get_img($prod['id_tof_produit']);
					
			
				
			$data['page_contenu'] = $this->load->view('produit/produit_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
				
				
				
			}
			
			}else
			{
				redirect('Produit');	
			}	
		
	}


	public function voir_produit(){
		
		
		$id_prod= $this->uri->segment(3);
			
			
			
			$data['fonction_titre']='Fiche de Produit';	
			$data['titre_page']= 'Fiche de Produit';
			$data['titre_interne']= 'Fiche de Produit';
			$data['nom_vue']= 'table_voir.php';
			
			$this->load->model('produit_model');
			$this->load->model('categorie_model');
			$this->load->model('tof_model');
			$produit_tr = $this->produit_model->get_produit_id($id_prod);
			
			$data['produit_tr'] = $produit_tr;
			$data['categ']= $this->categorie_model->get_categorie_b($produit_tr['categorie_produit']);	
			$data['img_prod']= $this->tof_model->get_img($produit_tr['id_tof_produit']);
			
				
			$data['page_contenu'] = $this->load->view('produit/produit_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
	}
	
	
	public function supprimer_produit(){
		
		
			$id_prod= $this->uri->segment(3);
			
			
			
			$data['fonction_titre']='Supprimer Produit';	
			$data['titre_page']= 'Supprimer Produit';
			$data['titre_interne']= 'Valider suppression';
			$data['nom_vue']= 'prod_supprimer.php';
			
			$this->load->model('produit_model');
			
			$data['produit_tr'] = $this->produit_model->get_produit_id($id_prod);
			
			if ($this->input->post('valider'))
			{	
				$this->produit_model->drop_produit($this->input->post('id_produit'));
				redirect('produit');
			}			
				
			$data['page_contenu'] = $this->load->view('produit/produit_theme',$data,TRUE);
			$this->load->view('layout_admin',$data);
		
		
	}
	
	
	
	
	
	function valid_date($str,$format= 'dd/mm/yyyy'){
		
	
	 
	 		$this->form_validation->set_message('valid_date','► %s de forme invalide.');
	        switch($format)
	        {
	
	            case 'yyyy/mm/dd':
	                if(preg_match("/^(19\d\d|2\d\d\d)[\/|-](0?[1-9]|1[012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/", $str,$match) && checkdate($match[2],$match[3],$match[1]))
	                {
	                    return TRUE;
	                }
	            break;
	            case 'mm/dd/yyyy':
	                if(preg_match("/^(0?[1-9]|1[012])[\/|-](0?[1-9]|[12][0-9]|3[01])[\/|-](19\d\d|2\d\d\d)$/", $str,$match) && checkdate($match[1],$match[2],$match[3]))
	                {
	                    return TRUE;
	                }
	            break;
	            default: // 'dd/mm/yyyy'
	                if(preg_match("/^(0?[1-9]|[12][0-9]|3[01])[\/|-](0?[1-9]|1[012])[\/|-](19\d\d|2\d\d\d)$/", $str,$match) && checkdate($match[2],$match[1],$match[3]))
	                {
	                return TRUE;
	                }
	            break;
	
	        }
	        return FALSE;
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