<?php

class  Login_model extends CI_Model {

	function validate(){
		
		$this->db->where('login',$this->input->post('login'));
		$this->db->where('mot_pass_admin',do_hash($this->input->post('password')));
		$query = $this->db->get('admin');
		
		if ($query->num_rows == 1){
			return TRUE;
		}
		
	}
	
	function exist_admin($email){
		$query_str = "SELECT email_admin  FROM admin WHERE email_admin  = '$email'";
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
	
	function get_admin($email){
		$query_str = "SELECT email_admin  FROM admin WHERE email_admin  = '$email'";
		$result = $this->db->query($query_str);
		
		foreach($result->result() as $row){
			$data['username']= $row->login;
			$data['pass']= $row->mot_pass_admin;
		}
		
		return $data;
	}




}


?>