<?php
	
	class  Categorie_model extends CI_Model {
	
	
	function get_all_categorie_a(){
		$query = $this->db->query("select * from categorie");
		return $query->result();
	}
	
	function get_all_categorie_b_noid(){
		$query = $this->db->query("select * from sous_categorie");
		return $query->result();
	}
	
	function get_all_categorie_b($id){
		$query = $this->db->query("select * from sous_categorie where categorie_pere = '$id'");
		return $query->result();
	}
	
	
	
	
	function get_id_categorie_a($nom_categorie){
		$query = $this->db->query("SELECT * FROM categorie WHERE nom_categorie = '$nom_categorie'");
		$list = $query->result();
		foreach($list as $row){
		$id = $row->id_categorie;	
		}
		
		return $id;
	}
	
	function get_nom_categorie_a($id_categorie){
		$query = $this->db->query("SELECT * FROM categorie WHERE id_categorie = '$id_categorie'");
		$list = $query->result();
		foreach($list as $row){
		$nom_catego = $row->nom_categorie;	
		}
		
		return $nom_catego;
	}
	
	function get_nom_categorie_b($id_categorie){
		$query = $this->db->query("SELECT * FROM sous_categorie WHERE id_categorie = '$id_categorie'");
		$list = $query->result();
		foreach($list as $row){
		$nom_catego = $row->nom_categorie;	
		}
		
		return $nom_catego;
	}
	
	function get_categorie_a($id){
		$query = $this->db->query("select * from categorie where id_categorie = '$id'");
		$list = $query->result();
		foreach($list as $row){
		$data['id_catego'] = $row->id_categorie;
		$data['nom_catego'] = $row->nom_categorie;
		$data['date_ajout']	= $row->date_ajout_categorie;
		$data['type_categ']	= 'Principale';
		}
		return $data;
	}
	
	function get_categorie_b($id){
		$query = $this->db->query("select * from sous_categorie where id_categorie = '$id'");
		$list = $query->result();
		foreach($list as $row){
		$data['id_catego'] = $row->id_categorie;
		$data['nom_catego'] = $row->nom_categorie;
		$data['date_ajout']	= $row->date_ajout_categorie;
		$data['categ_parent_id'] = $row->categorie_pere;
		$data['categ_parent'] = $this->get_nom_categorie_a($row->categorie_pere);
		$data['type_categ']	= 'Secondaire';
		}
		return $data;
	}
	
	function get_categorie_b_nom($nom){
		$query = $this->db->query("select * from sous_categorie where nom_categorie = '$nom'");
		$list = $query->result();
		foreach($list as $row){
		$data['id_catego'] = $row->id_categorie;
		$data['nom_catego'] = $row->nom_categorie;
		$data['date_ajout']	= $row->date_ajout_categorie;
		$data['categ_parent_id'] = $row->categorie_pere;
		$data['categ_parent'] = $this->get_nom_categorie_a($row->categorie_pere);
		$data['type_categ']	= 'Secondaire';
		}
		return $data;
	}
	
	function nouv_categ($nom_categ){
	
		$query_str = "SELECT  id_produit, date_ajout_produit, titre_produit, url_image	
					  FROM `categorie`
					  JOIN `sous_categorie` ON categorie.id_categorie = categorie_pere
					  JOIN `produit` ON sous_categorie.id_categorie = categorie_produit
					  JOIN `images` ON id_image = id_tof_produit
					  WHERE (diponible =1 and categorie.nom_categorie = '$nom_categ')
					  ORDER BY date_ajout_produit DESC
					  LIMIT 0 , 15";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}	
	
	function prod_categ_a($nom_categ){
	
		$query_str = "SELECT  id_produit, date_ajout_produit, titre_produit, url_image	
					  FROM `categorie`
					  JOIN `sous_categorie` ON categorie.id_categorie = categorie_pere
					  JOIN `produit` ON sous_categorie.id_categorie = categorie_produit
					  JOIN `images` ON id_image = id_tof_produit
					  WHERE (diponible =1 and categorie.nom_categorie = '$nom_categ')
					  ORDER BY date_ajout_produit DESC
					  ";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}	
	
	function prod_categ_limit($nom_categ,$limit,$offset){
	
		$query_str = "SELECT  id_produit, date_ajout_produit, titre_produit, sous_categorie.nom_categorie, Date_parution_produit, prix_uni_produit, url_image	
					  FROM `categorie`
					  JOIN `sous_categorie` ON categorie.id_categorie = categorie_pere
					  JOIN `produit` ON sous_categorie.id_categorie = categorie_produit
					  JOIN `images` ON id_image = id_tof_produit
					  WHERE (diponible =1 and categorie.nom_categorie = '$nom_categ')
					  ORDER BY date_ajout_produit DESC
					  LIMIT $offset , $limit
					  ";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}	
	
	
/**************************************/	
	
	function nouv_sous_categ($nom_categ){
	
		$query_str = "SELECT  id_produit, date_ajout_produit, titre_produit, url_image	
					  FROM `sous_categorie`
					  JOIN `produit` ON sous_categorie.id_categorie = categorie_produit
					  JOIN `images` ON id_image = id_tof_produit
					  WHERE (diponible =1 and nom_categorie = '$nom_categ')
					  ORDER BY date_ajout_produit DESC
					  LIMIT 0 , 15";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
	
	
	function prod_categ_b($nom_categ){
	
		$query_str = "SELECT id_produit, date_ajout_produit, titre_produit, url_image
						FROM `sous_categorie`
						JOIN `produit` ON id_categorie = categorie_produit
						JOIN `images` ON id_image = id_tof_produit
						WHERE (
						diponible =1
						AND nom_categorie = '$nom_categ'
						)
						ORDER BY date_ajout_produit DESC
					  ";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}	
	
	
	function prod_sous_categ_limit($nom_categ,$limit,$offset){
	
		$query_str = "SELECT id_produit, date_ajout_produit, titre_produit, sous_categorie.nom_categorie, Date_parution_produit, prix_uni_produit, url_image
						FROM `sous_categorie`
						JOIN `produit` ON id_categorie = categorie_produit
						JOIN `images` ON id_image = id_tof_produit
						WHERE (
						diponible =1
						AND sous_categorie.nom_categorie = '$nom_categ'
						)
						ORDER BY date_ajout_produit DESC
					 	LIMIT $offset , $limit
					  ";
		$query = $this->db->query($query_str);
		
		return $query;
		
	}
}

?>