<?php

class  Client_model extends CI_Model {
	
	
	function get_all_client(){
		$query = $this->db->query("select * from client");
		return $query->result();
	}
	
	function get_all_client_row(){
		$query = $this->db->query("select * from client");
		return $query;
	}
	
	function get_client($id_client){
	
		$query_str = "SELECT * FROM client WHERE id_client = '$id_client'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$client_tr['id_client'] = $row->id_client;
		$client_tr['nom_client'] = $row->nom_client ;
		$client_tr['prenom_client'] = $row->prenom_client ;
		$client_tr['email_client'] = $row->email_client;
		$client_tr['tel_client'] = $row->tel_client;
		$client_tr['civil_client'] = $row->civil_client;
		$client_tr['newsletter_client'] = $row->newsletter_client;
		$client_tr['date_ajout_client'] = $row->date_ajout_client;	
		}
		return $client_tr;
	}
	
	
	
	
	function ajouter_client($client_aj){
		
		$client = array(
				   'nom_client' => $client_aj['nom_client'] ,
				   'prenom_client' => $client_aj['prenom_client'] ,
				   'email_client' => $client_aj['email_client'] ,
				   'tel_client' => $client_aj['tel_client'] ,
				   'civil_client' => $client_aj['civil_client'] ,
				   'mot_pass_client' => $client_aj['mot_pass_client'] ,
				   'newsletter_client' => $client_aj['newsletter_client'] 
					);

		$this->db->insert('client', $client);
	}
	
	
	function exist_client($email){
		$query_str = "SELECT email_client FROM client WHERE email_client = '$email'";
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
	
	function update_client($id_client,$client_aj){
		$data = array(
               'nom_client' => $client_aj['nom_client'],
			   'prenom_client' => $client_aj['prenom_client'],
			   'email_client' => $client_aj['email_client'],
			   'tel_client' => $client_aj['tel_client'] ,
			   'civil_client' => $client_aj['civil_client'],
			   'newsletter_client' => $client_aj['newsletter_client']
            );
		
			
		
		
		$this->db->where('id_client', $id_client);
		$this->db->update('client', $data); 
	}
	
	
	function get_adr_client($id_client){
	
		$query_str = "SELECT adresse_client FROM client WHERE id_client = '$id_client'";
		
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$client_adr = $row->adresse_client;
		}
		return $client_adr;
	}
	
	function drop_client($id_client){
		
		$this->db->where('id_client', $id_client);
		$this->db->delete('client'); 
	}
	
}

?>