<?php

class  Produit_model extends CI_Model {

	function ajout_produit($prod){
		$prod_aj = array(
				   'titre_produit' => $prod['titre_produit'] ,
				   'resum_produit' => $prod['resum_produit'] ,
				   'sommaire_produit' => $prod['sommaire_produit'] ,
				   'editeur_produit' => $prod['editeur_produit'] ,
				   'ISBN_produit' => $prod['ISBN_produit'] ,
				   'Date_parution_produit' => $prod['Date_parution_produit'] ,
				   'nbre_page_produit' => $prod['nbre_page_produit'] ,
				   'categorie_produit' => $prod['categorie_produit'] ,
				   'poids_produit' => $prod['poids_produit'] ,
				   'id_tof_produit' => $prod['id_tof_produit'] ,
				   'quantite_produit' => $prod['quantite_produit'] ,
				   'diponible' => $prod['diponible'] ,
				   'prix_uni_produit' => $prod['prix_uni_produit'] 
					);
					
		if ($prod_aj['quantite_produit']== 0){
			$prod_aj['diponible'] = FALSE;
		}

		$this->db->insert('produit', $prod_aj);
	}
	
	
	function get_all_produit(){
				
		$query = $this->db->query("select * from produit");
		return $query->result();
		
	}
	
	function get_all_produit_row(){
				
		$query = $this->db->query("select * from produit");
		return $query;
		
	}

	
	function get_produit_id($id_prod){
		
		$query_str = "SELECT * FROM produit WHERE id_produit = '$id_prod'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$produit_tr['id_produit'] = $row->id_produit;
		$produit_tr['date_ajout_produit'] = $row->date_ajout_produit ;
		$produit_tr['categorie_produit'] = $row->categorie_produit ;
		$produit_tr['titre_produit'] = $row->titre_produit;
		$produit_tr['editeur_produit'] = $row->editeur_produit;
		$produit_tr['ISBN_produit'] = $row->ISBN_produit;
		$date = $row->Date_parution_produit;
		$date = explode('-',$date);				
		$produit_tr['Date_parution_produit'] = $date[2].'/'.$date[1].'/'.$date[0];
		$produit_tr['nbre_page_produit'] = $row->nbre_page_produit;
		$produit_tr['poids_produit'] = $row->poids_produit;
		$produit_tr['sommaire_produit'] = $row->sommaire_produit;
		$produit_tr['resum_produit'] = $row->resum_produit;
		$produit_tr['prix_uni_produit'] = $row->prix_uni_produit;	
		$produit_tr['id_tof_produit'] = $row->id_tof_produit;	
		$produit_tr['quantite_produit'] = $row->quantite_produit;
		$produit_tr['diponible'] = $row->diponible;
				
		}
		return $produit_tr;
		
	}
	
	
	function update_produit($id_prod,$prod,$mod_img){
		
		$data = array(
				   'titre_produit' => $prod['titre_produit'] ,
				   'resum_produit' => $prod['resum_produit'] ,
				   'sommaire_produit' => $prod['sommaire_produit'] ,
				   'editeur_produit' => $prod['editeur_produit'] ,
				   'ISBN_produit' => $prod['ISBN_produit'] ,
				   'Date_parution_produit' => $prod['Date_parution_produit'] ,
				   'nbre_page_produit' => $prod['nbre_page_produit'] ,
				   'categorie_produit' => $prod['categorie_produit'] ,
				   'poids_produit' => $prod['poids_produit'] ,
				   'quantite_produit' => $prod['quantite_produit'] ,
				   'diponible' => $prod['diponible'] ,
				   'prix_uni_produit' => $prod['prix_uni_produit'] 
					);
		if ($mod_img == TRUE){
			$data['id_tof_produit']= $prod['id_tof_produit'];
		}
		
		if ($data['quantite_produit'] == 0){
			$data['diponible'] = FALSE;
		}
					
		$this->db->where('id_produit', $id_prod);
		$this->db->update('produit', $data); 
		
		
		
		
	}
	
	
	function update_quantite_cmd($id_cmd){
		
		$query_str = "SELECT * FROM ventes WHERE id_cmd_vente = '$id_cmd'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		foreach($list as $row){
			$id = $row->id_product_vente;
			$query = $this->db->query("select quantite_produit from produit where id_produit = $id ");
			foreach($query->result() as $row1){
				
				$quantite_ini = $row1->quantite_produit;
				$quant_achat = $row->quantite_prod_vente;
			}
			$rest = $quantite_ini - $quant_achat;
			if($rest > 0){
				$data = array(
				'quantite_produit'=> $rest,
				'diponible' => TRUE
				);
			}
			if($rest == 0){
				$data = array(
				'quantite_produit'=> $rest,
				'diponible' => False
				);
			}
			
			
			$this->db->where('id_produit', $id);
			$this->db->update('produit', $data); 
		}
		
		
	}

	
	function drop_produit($id_prod){
	
		$this->db->where('id_produit', $id_prod);
		$this->db->delete('produit'); 
	}


	
}

?>