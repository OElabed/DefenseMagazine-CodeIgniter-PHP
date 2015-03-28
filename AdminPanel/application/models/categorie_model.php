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
	
	function exist_categorie_a($catego){
		$query_str = "SELECT nom_categorie FROM categorie WHERE nom_categorie = '$catego'";
		$result = $this->db->query($query_str);
		
		if ($result->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}
	
	
	function exist_categorie_b($catego){
		$query_str = "SELECT nom_categorie FROM sous_categorie WHERE nom_categorie = '$catego'";
		$result = $this->db->query($query_str);
		
		if ($result->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}
	
	
	
	
	function ajout_categorie_a($nom){
		$categorie = array(
				   'nom_categorie' => $nom 
					);

		$this->db->insert('categorie', $categorie);
	}
	
	
	function ajout_categorie_b($nom,$categ_pere){
		$categorie = array(
				   'nom_categorie' => $nom ,
				   'categorie_pere' =>  $categ_pere
					);

		$this->db->insert('sous_categorie', $categorie);
	}
	
	function update_categorie_a($id_catego,$nom_catego){
		$data = array(
               'nom_categorie' => $nom_catego
			    );
		
		$this->db->where('id_categorie', $id_catego);
		$this->db->update('categorie', $data); 
	}
	
	
	function update_categorie_b($id_catego,$id_parent,$nom_catego){
		$data = array(
               'nom_categorie' => $nom_catego,
			   'categorie_pere' => $id_parent
			    );
		
		$this->db->where('id_categorie', $id_catego);
		$this->db->update('sous_categorie', $data); 
	}
	
	
	function drop_categorie_a($id_catego){
		$this->db->where('id_categorie', $id_catego);
		$this->db->delete('categorie'); 
	}
	
	function drop_categorie_b($id_catego){
		$this->db->where('id_categorie', $id_catego);
		$this->db->delete('sous_categorie'); 
	}
	
		

}

?>