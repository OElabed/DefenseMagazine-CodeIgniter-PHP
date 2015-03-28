<?php

class  Recherche_model extends CI_Model {

	
	function get_recherche($mot_ch){
	
		$query_str = "
			SELECT * FROM `produit` WHERE  titre_produit like '%$mot_ch%' 
		";
		$query = $this->db->query($query_str);
		return $query;
	
	}
	
	function get_recherche_limit($mot_ch){
	
		$query_str = "
			SELECT id_produit, nom_categorie, date_ajout_produit,quantite_produit, titre_produit, Date_parution_produit, prix_uni_produit, url_image, resum_produit ,editeur_produit,ISBN_produit ,nbre_page_produit ,poids_produit ,sommaire_produit
FROM `produit`
JOIN `sous_categorie` ON id_categorie = categorie_produit
JOIN `images` ON id_image = id_tof_produit
WHERE  titre_produit like '%$mot_ch%'
ORDER BY date_ajout_produit DESC
		";
		$query = $this->db->query($query_str);
		return $query;
	
	}
	
	
	function get_recherche_avance($data_rech_av){
	
	$query_str = "
			SELECT id_produit, nom_categorie, date_ajout_produit,quantite_produit, titre_produit, Date_parution_produit, prix_uni_produit, url_image, resum_produit ,editeur_produit,ISBN_produit ,nbre_page_produit ,poids_produit ,sommaire_produit
FROM `produit`
JOIN `sous_categorie` ON id_categorie = categorie_produit
JOIN `images` ON id_image = id_tof_produit WHERE ";
 

	$i=FALSE;
	
	if($data_rech_av['titre']!=''){
	$i=TRUE;	
	$mot_ch =$data_rech_av['titre'];
	
	$query_str =$query_str." titre_produit like '%$mot_ch%'";	
		
	}
	
	if($data_rech_av['editeur']!=''){
		if($i){
		$query_str=$query_str." or ";	
		}
	$i=TRUE;	
	$mot_ch =$data_rech_av['editeur'];
	
	$query_str =$query_str." editeur_produit like '%$mot_ch%'";	
		
	}
	
	if($data_rech_av['categ']!=''){
		if($i){
		$query_str=$query_str." or ";	
		}
	$i=TRUE;	
	$mot_ch =$data_rech_av['categ'];
	
	$query_str =$query_str." nom_categorie like '%$mot_ch%'";	
		
	}
	
	if($data_rech_av['date_paru']!=''){
		if($i){
		$query_str=$query_str." or ";	
		}
	$i=TRUE;	
	
	$mot_ch =$data_rech_av['date_paru'];
	$mot_ch = explode('/',$mot_ch);				
	$mot_ch= $mot_ch[2].'-'.$mot_ch[1].'-'.$mot_ch[0];
	
	$query_str =$query_str." Date_parution_produit like '%$mot_ch%'";	
		
	}
	$min=FALSE;
	if($data_rech_av['prix_min']!=''){
		if($i){
		$query_str=$query_str." or ";	
		}
	$i=TRUE;
	$min=TRUE;	
	$mot_ch =$data_rech_av['prix_min'];
	
	$query_str =$query_str." prix_uni_produit >= $mot_ch";	
		
	}
	
	if($data_rech_av['prix_max']!=''){
		if(!$min){
		if($i){
		$query_str=$query_str." or ";	
		}
		}else
		{
			$query_str=$query_str." and ";
		}
		
	$i=TRUE;	
	$mot_ch =$data_rech_av['prix_max'];
	
	$query_str =$query_str." prix_uni_produit <= $mot_ch";	
		
	}
	
	
	
	
	$query_str =$query_str." ORDER BY date_ajout_produit DESC";
	$query = $this->db->query($query_str);
	return $query;
	
	}
	
	
	
	
	


}

?>