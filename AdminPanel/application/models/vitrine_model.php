<?php

class  Vitrine_model extends CI_Model {


function get_selection_gauche(){
	$query_str = "SELECT titre_produit 
					FROM selction_boutique 
					Join produit on produit.id_produit= selction_boutique.id_produit
					WHERE id_selection = 1";
					
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
			$titre = $row->titre_produit;
		}
		
		return $titre;
}

function get_selection_droite(){
	$query_str = "SELECT titre_produit 
					FROM selction_boutique 
					Join produit on produit.id_produit= selction_boutique.id_produit
					WHERE id_selection = 2";
					
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
			$titre = $row->titre_produit;
		}
		
		return $titre;
}

function get_all_prod(){
	$query_str = "SELECT id_produit, titre_produit 
					FROM produit 
					WHERE diponible = TRUE";
					
		$query = $this->db->query($query_str);
				
		return $query;
}

function modif_select($id_prod,$type){
	
	if($type == 'G'){
		
		$data = array(
			'id_produit' => $id_prod
		);
		$this->db->where('id_selection', 1);
		$this->db->update('selction_boutique', $data); 
	}
	if($type == 'D'){
		
		$data = array(
			'id_produit' => $id_prod
		);
		$this->db->where('id_selection', 2);
		$this->db->update('selction_boutique', $data); 
	}
	
}

function get_drap(){
		$query = $this->db->query("select * from monnaie");
		return $query->result();
	}
	
	function get_drap_by_nompys($id_mon){
		$query = $this->db->query("select * from monnaie
		where id_mon = '$id_mon'
		");
		foreach($query->result() as $row){
			$data['nom_mon']=$row->nom_mon;
			$data['mult_mon']=$row->mult_mon;
			$data['tof_pays']=$row->tof_pays;
			
			
		}
		return $data;
	}
	
	function update_monnaie($id_mon,$mult){
		$data = array(
			'mult_mon' => $mult
		);
		$this->db->where('id_mon', $id_mon);
		$this->db->update('monnaie', $data);
	}

}
?>