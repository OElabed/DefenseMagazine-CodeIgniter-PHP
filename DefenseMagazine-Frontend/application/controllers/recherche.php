<?php 

class Recherche extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Produit_model');
		$this->load->model('acceuil_model');
		$this->load->model('Recherche_model');
	}
	
	public function index(){	
			
			$this->affiche_result();
		
			
		}
	
	public function affiche_result(){
		
			$mot_ch=$this->input->post('search');
			
			
			$data['titre_page']= 'Recherche';
			$data['fonction_titre']='Recherche';	
			$data['nom_vue_doite']= 'recherche_droite.php';
			$data['nom_vue_gauche']= 'recherche_gauche.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			
			$data['list_drap'] = $this->drap_get();
			$data['list_der_achat'] = $this->dernier_achats();
			$data['mot_ch']= $mot_ch;
			/******************/
			
			
			$data['list_chercher'] = $this->Recherche_model->get_recherche_limit($mot_ch);
			/******************/
			
			$data['page_contenu'] = $this->load->view('recherche/recherche_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
			
		
	}
	
	public function recherche_avance(){
	
			$mot_ch= $this->input->post('mot_ch');
			
			$data['titre_page']= 'Recherche Avancé';
			$data['fonction_titre']='Recherche Avancé';	
			$data['nom_vue_doite']= 'recherche_droite.php';
			$data['nom_vue_gauche']= 'recherche_gauche_avance.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			
			$data['list_drap'] = $this->drap_get();
			$data['list_nouveau'] = $this->nouveaute_list();
			$data['list_der_achat'] = $this->dernier_achats();
			$data['mot_ch']= $mot_ch;
			/******************/
			
			/******************/
			
			$data['page_contenu'] = $this->load->view('recherche/recherche_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
	}
	
	
	public function recherche_avance_submit(){
		
			 $this->form_validation->set_rules('titre','Titre','xss_clean');
			 $this->form_validation->set_rules('editeur','Editeur','xss_clean');
			 if($this->input->post('date_paru') and $this->input->post('date_paru')!= ' dd/mm/yyyy'){
			 	$this->form_validation->set_rules('date_paru','Date de parution','xss_clean|callback_valid_date');
			 }
		 	 $this->form_validation->set_rules('prix_min','Prix_min','numeric|xss_clean');
		 	 $this->form_validation->set_rules('prix_max','Prix_min','numeric|xss_clean');	
			 
			 if ($this->form_validation->run() == TRUE ){
			 	
				$data_rech_av= array(
					'titre'=>'',
					'editeur'=>'',
					'date_paru'=>'',
					'categ'=>'',
					'prix_min'=>'',
					'prix_max'=>''				
				);
			 	$mot_ch = '';
				if($this->input->post('titre')){
					$data_rech_av['titre']=$this->input->post('titre');
					
				}
				if($this->input->post('editeur')){
					$data_rech_av['editeur']=$this->input->post('editeur');
					
				}
				if($this->input->post('categ')!= ' '){
					$data_rech_av['categ']=$this->input->post('categ');
					
				}
				if($this->input->post('date_paru') and $this->input->post('date_paru')!= ' dd/mm/yyyy'){
					$data_rech_av['date_paru']=$this->input->post('date_paru');
					
				}
				if($this->input->post('prix_min')){
					$data_rech_av['prix_min']=$this->input->post('prix_min');
					
				}
				if($this->input->post('prix_max')){
					$data_rech_av['prix_max']=$this->input->post('prix_max');
					
				}
				
				$list_recherche = $this->Recherche_model->get_recherche_avance($data_rech_av);
				
				$data['mot_ch']= $mot_ch;
				$data['titre_page']= 'Recherche Avancée';
				$data['fonction_titre']='Recherche Avancée';	
				$data['nom_vue_doite']= 'recherche_droite.php';
				$data['nom_vue_gauche']= 'recherche_gauche.php';	
				$data['categ']= $this->affiche_categ();
			
				$img_path = 'http://localhost/monprojet/image_produit/thumb/';
				$data['img_path'] = $img_path;
				$data['list_drap'] = $this->drap_get();
				$data['list_der_achat'] = $this->dernier_achats();
				/******************/
				$data['list_chercher'] = $list_recherche;
				/******************/
			
				$data['page_contenu'] = $this->load->view('recherche/recherche_theme',$data,TRUE);
				$this->load->view('layout',$data);
				
				
				
			 
			 }
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	private function nouveaute_list(){
		
		$list_nouveau = $this->acceuil_model->nouveaute_boutique();
		return $list_nouveau;
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
	
	
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}
	
}
?>