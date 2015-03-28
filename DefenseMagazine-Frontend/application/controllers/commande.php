<?php

class Commande extends CI_Controller {


	function __construct(){
		
	
		parent::__construct();
		$this->load->model('acceuil_model');
		$this->load->model('Commande_model');
		$this->load->model('Produit_model');
		$this->load->library('pagination');
	}
	
	public function index(){	
			
			$this->cmd_adresse();
		
			
	}


	
	public function cmd_adresse(){
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			  if($is_logged_in == true)
				{
						$list_adr= $this->Commande_model->get_adr_client($this->session->userdata('login'));
						if($list_adr->num_rows()> 0 ){
							redirect ('commande/choix_adr');
							
							
							
						}else{
							redirect ('commande/ajout_adr_liv');
						
						}
								
				}else{
					redirect('Compte');
				}
			
	}
	
	
	
	public function choix_adr(){
					
					
	
					$data['titre_page']= 'Commande - Adresse';
					$data['fonction_titre']='Adresse';	
					$data['nom_vue_doite']= 'commande_contenu_droite.php';
					$data['nom_vue_gauche']= 'commande_contenu_gauche.php';	
					$list_adr= $this->Commande_model->get_adr_client($this->session->userdata('login'));
					
					$data['fonction_affiche']= 'commande_choix_adresse.php';
					$data['list_adr'] = $list_adr;		
	
					$data['categ']= $this->affiche_categ();	
					$img_path = 'http://localhost/monprojet/image_produit/thumb/';
					$data['img_path'] = $img_path;
					$data['list_drap'] = $this->drap_get();
					$data['list_der_achat'] = $this->dernier_achats();
					$data['page_contenu'] = $this->load->view('commande/commande_theme',$data,TRUE);
					$this->load->view('layout',$data);	
					
	}
			
		
		
	public function ajout_adr_liv(){
	
					$this->ajout_adr_liv_submit();
					$data['titre_page']= 'Commande - Adresse';
					$data['fonction_titre']='Adresse';	
					$data['nom_vue_doite']= 'commande_contenu_droite.php';
					$data['nom_vue_gauche']= 'commande_contenu_gauche.php';	
					
					$data['fonction_affiche']= 'commande_ajout_adresse_liv.php';	
		
	
					$data['categ']= $this->affiche_categ();	
					$img_path = 'http://localhost/monprojet/image_produit/thumb/';
					$data['img_path'] = $img_path;
					$data['list_drap'] = $this->drap_get();
					$data['list_der_achat'] = $this->dernier_achats();
					$data['page_contenu'] = $this->load->view('commande/commande_theme',$data,TRUE);
					$this->load->view('layout',$data);	
					
	}
	
	
	public function ajout_adr_liv_unique(){
	
					$this->ajout_adr_liv_unique_submit();
					$data['titre_page']= 'Commande - Adresse';
					$data['fonction_titre']='Adresse';	
					$data['nom_vue_doite']= 'commande_contenu_droite.php';
					$data['nom_vue_gauche']= 'commande_contenu_gauche.php';	
					
					$data['fonction_affiche']= 'commande_ajout_adresse_liv_un.php';	
		
	
					$data['categ']= $this->affiche_categ();	
					$img_path = 'http://localhost/monprojet/image_produit/thumb/';
					$data['img_path'] = $img_path;
					$data['list_drap'] = $this->drap_get();
					$data['list_der_achat'] = $this->dernier_achats();
					$data['page_contenu'] = $this->load->view('commande/commande_theme',$data,TRUE);
					$this->load->view('layout',$data);	
					
	}
	
	
	
	
	
	public function ajout_adr_fct(){
					
					
					$this->ajout_adr_fct_submit();
					$data['titre_page']= 'Commande - Adresse';
					$data['fonction_titre']='Adresse';	
					$data['nom_vue_doite']= 'commande_contenu_droite.php';
					$data['nom_vue_gauche']= 'commande_contenu_gauche.php';	
					
					$data['fonction_affiche']= 'commande_ajout_adresse_fct.php';	
		
	
					$data['categ']= $this->affiche_categ();	
					$img_path = 'http://localhost/monprojet/image_produit/thumb/';
					$data['img_path'] = $img_path;
					$data['list_drap'] = $this->drap_get();
					$data['list_der_achat'] = $this->dernier_achats();
					$data['page_contenu'] = $this->load->view('commande/commande_theme',$data,TRUE);
					$this->load->view('layout',$data);	
					
	}
		
	
	public function choix_adr_submit(){
	
		$newdata = array(
                   'adr_liv' => $this->input->post('adr_liv'),
                   'adr_fct' => $this->input->post('adr_fct'),
				   'method_expedit_cmd' => '',
				   'frais_livraison_cmd' => '',
				   'Montant_total' => $this->cart->total(),
				   'method_pay_cmd' => ''
				   
               );

		$this->session->set_userdata('cmd_data', $newdata);
	
	
		redirect('commande/expedition');
		
		
	}
	
	
	public function ajout_adr_liv_submit(){
			
			
			
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('adresse','Adresse','trim|required|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('codepostal','Codepostal','trim|required|numeric|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('ville','Ville','trim|required|alpha|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('tel','Téléphone','trim|required|numeric|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == TRUE ){
			
				 $adresse_aj['civil_adr'] =  $this->input->post('civilite');
				 $adresse_aj['nom_adr'] =  $this->input->post('nom');
				 $adresse_aj['prenom_adr'] =  $this->input->post('prenom');
				 $adresse_aj['adresse_adr'] =  $this->input->post('adresse');
				 $adresse_aj['codepostal_adr'] =  $this->input->post('codepostal');
				 $adresse_aj['ville_adr'] =  $this->input->post('ville');
				 $adresse_aj['pays_adr'] =  $this->input->post('pays');
				 $adresse_aj['tel_adr'] =  $this->input->post('tel');
					$id_adr=  $this->Commande_model->ajouter_adresse($adresse_aj,$this->Commande_model->get_id_client($this->session->userdata('login')),'livraison'); 
				 
				 if ($this->input->post('fct_quest') =='meme'){
				 
			
					redirect('commande/ajout_adr_fct');	
				 }
				 else
				 {
				 		 	$this->Commande_model->meme_adr_fct($id_adr,$this->Commande_model->get_id_client($this->session->userdata('login')),'facturation');
					
					redirect('commande/choix_adr');	
				 }
			}
			
			
	
	}
	
	
	
	public function ajout_adr_liv_unique_submit(){
			
			
			
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('adresse','Adresse','trim|required|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('codepostal','Codepostal','trim|required|numeric|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('ville','Ville','trim|required|alpha|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('tel','Téléphone','trim|required|numeric|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == TRUE ){
			
				 $adresse_aj['civil_adr'] =  $this->input->post('civilite');
				 $adresse_aj['nom_adr'] =  $this->input->post('nom');
				 $adresse_aj['prenom_adr'] =  $this->input->post('prenom');
				 $adresse_aj['adresse_adr'] =  $this->input->post('adresse');
				 $adresse_aj['codepostal_adr'] =  $this->input->post('codepostal');
				 $adresse_aj['ville_adr'] =  $this->input->post('ville');
				 $adresse_aj['pays_adr'] =  $this->input->post('pays');
				 $adresse_aj['tel_adr'] =  $this->input->post('tel');
					$id_adr=  $this->Commande_model->ajouter_adresse($adresse_aj,$this->Commande_model->get_id_client($this->session->userdata('login')),'livraison'); 
				 
				
				 		 
					
					redirect('commande/choix_adr');	
			}
			
			
	
	}
	
	
	
	public function ajout_adr_fct_submit(){
			
			
			
		 $this->form_validation->set_rules('nom','Nom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('prenom','Prénom','trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
		 $this->form_validation->set_rules('adresse','Adresse','trim|required|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('codepostal','Codepostal','trim|required|numeric|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('ville','Ville','trim|required|alpha|min_length[3]|xss_clean');
		 $this->form_validation->set_rules('tel','Téléphone','trim|required|numeric|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == TRUE ){
			
				 $adresse_aj['civil_adr'] =  $this->input->post('civilite');
				 $adresse_aj['nom_adr'] =  $this->input->post('nom');
				 $adresse_aj['prenom_adr'] =  $this->input->post('prenom');
				 $adresse_aj['adresse_adr'] =  $this->input->post('adresse');
				 $adresse_aj['codepostal_adr'] =  $this->input->post('codepostal');
				 $adresse_aj['ville_adr'] =  $this->input->post('ville');
				 $adresse_aj['pays_adr'] =  $this->input->post('pays');
				 $adresse_aj['tel_adr'] =  $this->input->post('tel');
				 $id_adr=  $this->Commande_model->ajouter_adresse($adresse_aj,$this->Commande_model->get_id_client($this->session->userdata('login')),'facturation'); 
				 
				 
					
					redirect('commande/choix_adr');
			}
			
			
	
	}
	
	
	
	public function expedition(){
		
		
		
		$data['titre_page']= 'Commande - Expédition';
		$data['fonction_titre']='Expédition';	
		$data['nom_vue_doite']= 'commande_contenu_droite.php';
		$data['nom_vue_gauche']= 'commande_contenu_gauche.php';	
					
		$data['fonction_affiche']= 'commande_expedition.php';	
		$data['categ']= $this->affiche_categ();	
		$img_path = 'http://localhost/monprojet/image_produit/thumb/';
		$data['img_path'] = $img_path;
		$data['list_der_achat'] = $this->dernier_achats();
		$data['list_drap'] = $this->drap_get();
		
		/************************Module La poste - calcul frais livraison******************************/
		$euro_arabe = array("Allemagne", "Arabie_Saoudite", "Autriche", "Bahrein", "Belgique", "Bulgarie", "Croatie", "Danemark", "Egypte", "Emirats_Arabes_Unis", "Espagne", "Estonie", "Finlande", "France", "Grece", "Iraq", "Irlande", "Islande", "italie", "Jordanie", "Koweit", "Liban", "Luxembourg", "Macao", "Malte", "Monaco", "Norvege", "Oman", "Pays_Bas", "Pologne", "Portugal", "Qatar", "Republique_Tcheque", "Roumanie", "Slovenie", "Soudan", "Suede", "Suisse", "Swaziland", "Syrie", "Turquie", "Ukraine", "Vatican", "Yemen", "Yougoslavie" );
		
		$magrebin = array("Algerie", "Maroc", "Lybie", "Mauritanie");
		
		$cmd_data = $this->session->userdata('cmd_data');
		$pays = $this->Commande_model->get_pays_adr($cmd_data['adr_liv']);
		
		$poids=0;
		
		$frais_standard=0;
		$delais_standars='';
		$frais_rapide=0;
		$delais_rapide='';
		
		$cart = $this->cart->contents();
		foreach ($cart as $item){
		
			$poids += $this->Commande_model->get_poids_prod($item['id'])*$item['qty'];
				
		}
		
		
		if ($pays == 'Tunisie'){
		/***********************/
		
			if($poids <= 2000 ){
									
				$frais_standard = 3.000;	
				
			}else{
			
				$frais_standard = 3.000 + 0.200 * ceil(($poids-2000)/1000);
				
	   			}
				
			if($poids <= 250 ){
									
									$frais_rapide = 4.000;	
								}else{
									if ($poids >250 && $poids <= 500){
										$frais_rapide = 5.000;
									}else{
										if ($poids >500 && $poids <= 1000){
										$frais_rapide = 7.000;
										}else{
											$frais_rapide = 7.000 + 1.000 * ceil(($poids-1000)/1000);
										}
									}
								}
								
		$delais_standars='3-4 jours ouverts';
		$delais_rapide='1 jour ouvert';
		/******************************/
			
		}elseif (in_array($pays , $magrebin)){
		
			/***************************************************/
			
			if($poids <= 2000 ){
									
									$frais_standard = 6.000 ;	
								}else{
									$frais_standard = 6.000  + 2.000  * ceil(($poids-2000)/1000);
								}
			
			if($poids <= 1000 ){
									
									$frais_rapide = 22.000 ;	
								}else{
									$frais_rapide = 22.000  + 7.000  * ceil(($poids-1000)/1000);
								}
			
			
			
			
			$delais_standars='4 jours ouverts';
			$delais_rapide='1 jour ouvert';
			/***************************************************/
			
		}elseif (in_array($pays , $euro_arabe)){
		
		/***************************************************/
		
			if($poids <= 2000 ){
									
									$frais_standard = 9.000;	
								}else{
									$frais_standard = 9.000 + 2.800  * ceil(($poids-2000)/1000);
								}
			
			if($poids <= 1000 ){
									
									$frais_rapide = 25.000;	
								}else{
									$frais_rapide = 25.000 + 12.000  * ceil(($poids-1000)/1000);
								}
		
		$delais_standars='7 à 12 jours ouverts';
		$delais_rapide='2 à 3 jours ouverts';
		
		/***************************************************/
			
		}else{
			
			/***************************************************/
			if($poids <= 2000 ){
									
									$frais_standard = 15.000;	
								}else{
									$frais_standard = 15.000 + 7.000 * ceil(($poids-2000)/1000);
								}
			
			if($poids <= 1000 ){
									
									$frais_rapide = 35.000;	
								}else{
									$frais_rapide = 35.000 + 15.000 * ceil(($poids-1000)/1000);
								}
								
								
		$delais_standars='8 à 20 jours ouverts';
		$delais_rapide='2 à 4 jours ouverts';
							
		/***************************************************/
			
			
		}
		
		
		$data['frais_standard']= $frais_standard;
		$data['frais_rapide']= $frais_rapide;
		$data['delais_standars']= $delais_standars;
		$data['delais_rapide']= $delais_rapide;
		
		
		
		
		
		/********************************************/
		
		
		$data['page_contenu'] = $this->load->view('commande/commande_theme',$data,TRUE);
		$this->load->view('layout',$data);
		
		
		
		
	}
	
	
	
	
	public function expedition_submit(){
		
		$cmd_data = $this->session->userdata('cmd_data');
		
		if($this->input->post('choix_exped') == 1){
			$frais_liv = $this->input->post('frais_standard');
		}else{
			$frais_liv = $this->input->post('frais_rapide');
		}
		
		$total_pay=0;
		
		
		$newdata = array(
                   'adr_liv' => $cmd_data['adr_liv'],
                   'adr_fct' => $cmd_data['adr_fct'],
				   'method_expedit_cmd' => $this->input->post('choix_exped'),
				   'frais_livraison_cmd' => $frais_liv,
				   'Montant_total' => $this->cart->total(),
				   'method_pay_cmd' => ''
				   
               );

		$this->session->set_userdata('cmd_data', $newdata);
		
		redirect ('commande/payment');
		
	}
	
	
	
	public function payment(){
		
					$data['titre_page']= 'Commande - Paiement';
					$data['fonction_titre']='Paiement';	
					$data['nom_vue_doite']= 'commande_contenu_droite.php';
					$data['nom_vue_gauche']= 'commande_contenu_gauche.php';	
					
					$data['fonction_affiche']= 'commande_payment.php';	
		
	
					$data['categ']= $this->affiche_categ();	
					$img_path = 'http://localhost/monprojet/image_produit/thumb/';
					$data['img_path'] = $img_path;
					$data['list_der_achat'] = $this->dernier_achats();
					$data['list_drap'] = $this->drap_get();
					$data['cmd_data'] = $this->session->userdata('cmd_data');
					
					$data['page_contenu'] = $this->load->view('commande/commande_theme',$data,TRUE);
					$this->load->view('layout',$data);	
		
	}
	
	public function payment_submit(){
		
		
		$cmd_data = $this->session->userdata('cmd_data');
		
		
		
		$newdata = array(
                   'adr_liv' => $cmd_data['adr_liv'],
                   'adr_fct' => $cmd_data['adr_fct'],
				   'method_expedit_cmd' => $cmd_data['method_expedit_cmd'],
				   'frais_livraison_cmd' => $cmd_data['frais_livraison_cmd'],
				   'Montant_total_un' => $this->cart->total(),
				   'method_pay_cmd' => $this->input->post('choix_pay'),
				   'Montant_total' =>  $this->input->post('montant_total')
				   
               );

		$this->session->set_userdata('cmd_data', $newdata);
		
		
		redirect ('Payment_server');
		
		
		
	}
	
	
	public function authorisation_cmd(){
		
		$cmd_data = $this->session->userdata('cmd_data');
		$cart = $this->cart->contents();
		$ref=$this->input->post('reference_tr');
		$id_cli = $this->Commande_model->get_id_client($this->session->userdata('login'));
		
		$id_cmd = $this->Commande_model->insert_cmd($id_cli,$cmd_data,$cart,$ref);
		
		redirect ('Compte/details_cmd/'.$id_cmd);
		
		
		
		
		
		
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
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}


}

?>