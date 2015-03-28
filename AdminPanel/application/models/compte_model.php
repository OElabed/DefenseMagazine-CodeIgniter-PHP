<?php

class  Compte_model extends CI_Model {

	function get_admin(){
		$query_str = "SELECT * 
					FROM admin ";
					
		$query = $this->db->query($query_str);
		$list=$query->result();	
		foreach($list as $row){
			$info['email']=$row->email_admin;
			$info['login']=$row->login;
			
		}	
		return $info;
	}

	function update_admin($admin){
		$data = array(
               'email_admin' => $admin['email'],
			   'login' => $admin['login'],
			   'mot_pass_admin' => $admin['mot_pass']
			   
            );
		
			
		
		
		$this->db->where('id_admin', 2);
		$this->db->update('admin', $data); 
	}


}
?>