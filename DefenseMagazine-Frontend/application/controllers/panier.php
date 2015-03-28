<?php 

class Panier extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Produit_model');
		$this->load->model('acceuil_model');
	}
	
	public function index(){	
			
			$this->panier_voir();
		
			
		}
	
	public function panier_voir(){
		
			
			$data['titre_page']= 'Bienvenue dans Def. Mag';
			$data['fonction_titre']='Valider Panier';	
			$data['nom_vue_doite']= 'panier_contenu_droite.php';
			$data['nom_vue_gauche']= 'panier_contenu_gauche.php';	
			$data['categ']= $this->affiche_categ();
			
			$img_path = 'http://localhost/monprojet/image_produit/thumb/';
			$data['img_path'] = $img_path;
			
			$data['list_der_achat'] = $this->dernier_achats();
			$data['list_drap'] = $this->drap_get();
			
			$data['page_contenu'] = $this->load->view('panier/panier_theme',$data,TRUE);
			$this->load->view('layout',$data);
		
		
		
		
		
		
	}
	
	
	public function valid_commande(){
		
		$j=0;
		$cart = $this->cart->contents();
		foreach ($cart as $item):
		$j++;
		$data = array(
			'rowid' => $item['rowid'],
			'qty' => $this->input->post('nbr_'.$j)
		);
		
		$this->cart->update($data);
		
		endforeach; 
		
		redirect ('commande');
		
		
		
	}
	
	
	
	
	public function update(){
		$j=0;
		$cart = $this->cart->contents();
		foreach ($cart as $item):
		$j++;
		$data = array(
			'rowid' => $item['rowid'],
			'qty' => $this->input->post('nbr_'.$j)
		);
		
		$this->cart->update($data);
		
		endforeach; 
		
		redirect('panier/panier_voir');
	
	}
		
		function add() {
			$prod = $this->Produit_model->get_produit($this->input->post('id_prod'));
			$insert = array(
				'id' => $prod['id_produit'],
				'qty' => 1,
				'price' => $prod['prix_uni_produit'],
				'name' => ' '
			);
			
			$this->cart->insert($insert);
			
			$cart = $this->cart->contents();
			
			redirect($this->input->post('url_act'));			
		}
		
		
		function remove($rowid) {
		
		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => 0
		));
		
		redirect('panier/panier_voir');
		
		}
		
	
		
		
		function destroy() {
		
		$this->cart->destroy();
		redirect('panier/panier_voir');
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
	
	private function drap_get(){
		$list_drap = $this->acceuil_model->get_drap();
		return $list_drap;
	}
		
}
?>