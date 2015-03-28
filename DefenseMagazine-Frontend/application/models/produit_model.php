<?php

class  Produit_model extends CI_Model {

	
	

	

	
	function get_produit($id_prod){
	
		
		$query_str = "SELECT id_produit, nom_categorie, date_ajout_produit,quantite_produit, titre_produit, Date_parution_produit, prix_uni_produit, url_image, resum_produit ,editeur_produit,ISBN_produit ,nbre_page_produit ,poids_produit ,sommaire_produit
FROM `produit`
JOIN `sous_categorie` ON id_categorie = categorie_produit
JOIN `images` ON id_image = id_tof_produit
WHERE id_produit ='$id_prod'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		foreach($list as $row){
		$produit_tr['id_produit'] = $row->id_produit;
		$produit_tr['date_ajout_produit'] = date("F j, Y ", strtotime($row->date_ajout_produit));
		$produit_tr['date_ajout_produit_sans'] = $row->date_ajout_produit;
		$produit_tr['nom_categorie'] = $row->nom_categorie;
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
		$produit_tr['url_image'] = $row->url_image;
		$produit_tr['quantite_produit'] = $row->quantite_produit;
							
		}
		return $produit_tr;
		
	}
	
	
	
	
	

}

?>