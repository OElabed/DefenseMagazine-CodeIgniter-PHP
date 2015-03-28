<?php

class  Acceuil_model extends CI_Model {

	
	
	
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
	
	
	function dernier_achat(){
		$query_str = "SELECT id_produit, nom_categorie, titre_produit, Date_parution_produit, prix_uni_produit, date_vente,url_image
					  FROM `ventes` 
					  JOIN `produit` ON id_produit = id_product_vente
					  JOIN `sous_categorie` ON id_categorie = categorie_produit 
					  JOIN `images` ON id_image = id_tof_produit 	
					  WHERE diponible =1
   					  ORDER BY date_vente DESC
					  LIMIT 0 , 4";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	function select_boutique (){
		$query_str = "SELECT id_selection, produit.id_produit, nom_categorie, titre_produit, Date_parution_produit, prix_uni_produit, url_image	                     , resum_produit
						FROM `selction_boutique`
						JOIN `produit` ON selction_boutique.id_produit = produit.id_produit
						JOIN `sous_categorie` ON id_categorie = categorie_produit
						JOIN `images` ON id_image = id_tof_produit
						WHERE diponible =1
						LIMIT 0 , 2";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	function nouveaute_boutique(){
		
		$query_str = "	SELECT  id_produit, nom_categorie,date_ajout_produit, titre_produit, url_image	
						FROM `produit`
						JOIN `images` ON id_image = id_tof_produit
						JOIN `sous_categorie` ON id_categorie = categorie_produit
						WHERE diponible =1
						ORDER BY date_ajout_produit DESC
						LIMIT 0 , 15";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	
	function nouveaute_boutique_all(){
		
		$query_str = "	SELECT id_produit, nom_categorie, titre_produit, Date_parution_produit, prix_uni_produit, url_image	
						FROM `produit`
						JOIN `sous_categorie` ON id_categorie = categorie_produit
						JOIN `images` ON id_image = id_tof_produit
						WHERE diponible =1
						ORDER BY date_ajout_produit DESC
						";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	function nouveaute_boutique_all_limit($limit,$offset){
		
		$query_str = "	SELECT id_produit, nom_categorie, titre_produit, Date_parution_produit, prix_uni_produit, url_image	
						FROM `produit`
						JOIN `sous_categorie` ON id_categorie = categorie_produit
						JOIN `images` ON id_image = id_tof_produit
						WHERE diponible =1
						ORDER BY date_ajout_produit DESC
						LIMIT $offset , $limit
						";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	
	
	function top_produit (){
	
	$query_str = "SELECT id_produit, nom_categorie, titre_produit, Date_parution_produit, prix_uni_produit, count(id_produit) as Nombre,url_image
					  FROM `ventes` 
					  JOIN `produit` ON id_produit = id_product_vente
					  JOIN `sous_categorie` ON id_categorie = categorie_produit 
					  JOIN `images` ON id_image = id_tof_produit 	
					  WHERE diponible =1
					  group by id_produit
   					  ORDER BY Nombre DESC
					  LIMIT 0 , 5";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	 
	 
	function top_produit_all (){
	
	$query_str = "SELECT id_produit, nom_categorie, titre_produit, Date_parution_produit, prix_uni_produit, count(id_produit) as Nombre,url_image
					  FROM `ventes` 
					  JOIN `produit` ON id_produit = id_product_vente
					  JOIN `sous_categorie` ON id_categorie = categorie_produit 
					  JOIN `images` ON id_image = id_tof_produit 	
					  WHERE diponible =1
					  group by id_produit
   					  ORDER BY Nombre DESC
					  ";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	function top_produit_all_limit ($limit,$offset){
	
	$query_str = "SELECT id_produit, nom_categorie, titre_produit, Date_parution_produit, prix_uni_produit, count(id_produit) as Nombre,url_image
					  FROM `ventes` 
					  JOIN `produit` ON id_produit = id_product_vente
					  JOIN `sous_categorie` ON id_categorie = categorie_produit 
					  JOIN `images` ON id_image = id_tof_produit 	
					  WHERE diponible =1
					  group by id_produit
   					  ORDER BY Nombre DESC
					  LIMIT $offset , $limit
					  ";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	function get_drap(){
		$query = $this->db->query("select * from monnaie");
		return $query->result();
	}
	
	function get_drap_by_mail($email){
		$query = $this->db->query("select nom_mon,mult_mon,tof_pays from monnaie
		join client on nom_mon = pays_monnaie
		where email_client = '$email'
		");
		foreach($query->result() as $row){
			$data['nom_mon']=$row->nom_mon;
			$data['mult_mon']=$row->mult_mon;
			$data['tof_pays']=$row->tof_pays;
			
			
		}
		return $data;
	}
	
	function get_drap_by_nompys($nom_mon){
		$query = $this->db->query("select * from monnaie
		where nom_mon = '$nom_mon'
		");
		foreach($query->result() as $row){
			$data['nom_mon']=$row->nom_mon;
			$data['mult_mon']=$row->mult_mon;
			$data['tof_pays']=$row->tof_pays;
			
			
		}
		return $data;
	}

}

?>