<?php

class  Newsletter_model extends CI_Model {



function exist_abonner($email){
		$query_str = "SELECT email_news FROM newsletter WHERE email_news = '$email'";
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
	
	
	function ajout_abonner($abonner){
	
	
	$data= array(
				   'nom_news' =>  $abonner['nom_news'] ,
				   'prenom_news' => $abonner['prenom_news'] ,
				   'email_news' => $abonner['email_news'] 
					);

		$this->db->insert('newsletter', $data);	
	}
}
?>