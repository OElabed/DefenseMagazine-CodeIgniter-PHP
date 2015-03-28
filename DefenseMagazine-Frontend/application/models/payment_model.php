<?php

class Payment_model extends CI_Model {



	
	function get_nom_cli($email){
		
		$query_str = "SELECT * FROM client WHERE email_client  = '$email'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$cli['nom_client'] = $row->nom_client;
		$cli['prenom_client'] = $row->prenom_client;
		}
		return $cli;
		
	}
	
	
	
	

}

?>