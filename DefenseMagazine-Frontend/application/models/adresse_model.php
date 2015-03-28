<?php

class Adresse_model extends CI_Model {
	
	function ajouter_adresse($adresse_aj){
		
		$adresse = array(
				   'civil_adr' => $adresse_aj['civil_adr'] ,
				   'nom_adr' => $adresse_aj['nom_adr'] ,
				   'prenom_adr' => $adresse_aj['prenom_adr'] ,
				   'adresse_adr' => $adresse_aj['adresse_adr'] ,
				   'codepostal_adr' => $adresse_aj['codepostal_adr'] ,
				   'ville_adr' => $adresse_aj['ville_adr'],
				   'pays_adr' => $adresse_aj['pays_adr'] 
					);

		$this->db->insert('adresse', $adresse);
	}
	
	function get_adresse($id_adr){
	
		$query_str = "SELECT * FROM adresse WHERE id_adr = '$id_adr'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$adresse_tr['id_adr'] = $row->id_adr;
		$adresse_tr['nom_adr'] = $row->nom_adr ;
		$adresse_tr['prenom_adr'] = $row->prenom_adr ;
		$adresse_tr['adresse_adr'] = $row->adresse_adr;
		$adresse_tr['codepostal_adr'] = $row->codepostal_adr;
		$adresse_tr['ville_adr'] = $row->ville_adr;
		$adresse_tr['pays_adr'] = $row->pays_adr;
		}
		return $adresse_tr;
	}
	
	function get_id_adresse($nom,$prenom,$adr){
		$query = $this->db->query("SELECT * FROM `adresse` WHERE (nom_adr='$nom' and prenom_adr='$prenom' and adresse_adr='$adr')");
		$list = $query->result();
		foreach($list as $row){
		$id = $row->id_adr;	
		}
		
		return $id;
	}
	
	function update_adresse($id_adresse,$adresse_aj){
		
		$data = array(
               'civil_adr' => $adresse_aj['civil_adr'],
			   'nom_adr' => $adresse_aj['nom_adr'],
			   'prenom_adr' => $adresse_aj['prenom_adr'],
			   'adresse_adr' => $adresse_aj['adresse_adr'],
               'codepostal_adr' => $adresse_aj['codepostal_adr'],
               'ville_adr' => $adresse_aj['ville_adr'],
			   'pays_adr' => $adresse_aj['pays_adr']
            );
		
		$this->db->where('id_adr', $id_adresse);
		$this->db->update('adresse', $data); 
	}
	
}

?>