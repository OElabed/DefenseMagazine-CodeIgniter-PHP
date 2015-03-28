<?php

class Payment_model extends CI_Model {


	
	function get_meth_pay($id_pay){
		$query_str = "SELECT * FROM payment_method WHERE id_method_pay = '$id_pay'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$name = $row->name_method_pay;
		}
		return $name;
	}
	
	function get_trans($id_trans){
		
		$query_str = "SELECT * FROM transaction WHERE id_trans = '$id_trans'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$trans['cmd_trans'] = $row->cmd_trans;
		$trans['method_payment_trans'] = $row->method_payment_trans;
		$trans['num_autorisation'] = $row->num_autorisation;
		$trans['frais_trans'] = $row->frais_trans;
		$trans['date_trans'] = $row->date_trans;
		}
		return $trans;
		
	}
	
	
	
		function get_trans_conf($limit,$offset){
		
		$query_str = "SELECT id_trans, cmd_trans, method_payment_trans, num_autorisation, frais_trans, date_trans 
		FROM transaction 
		JOIN `commandes` ON id_cmd = cmd_trans
		where statut_cmd Like 'L%'
		LIMIT $offset , $limit";
		
		$query = $this->db->query($query_str);
		return $query;
		
	}
	
	function get_trans_conf_nolimit(){
		
		$query_str = "SELECT id_trans, cmd_trans, method_payment_trans, num_autorisation, frais_trans, date_trans 
		FROM transaction 
		JOIN `commandes` ON id_cmd = cmd_trans
		where statut_cmd Like 'L%'";
		
		$query = $this->db->query($query_str);
		return $query;
		
	}
	
	
	function get_trans_att($limit,$offset){
		
		$query_str = "SELECT id_trans, cmd_trans, method_payment_trans, num_autorisation, frais_trans, date_trans 
		FROM transaction 
		JOIN `commandes` ON id_cmd = cmd_trans
		where statut_cmd Like  'En Attente'
		LIMIT $offset , $limit";
		
		$query = $this->db->query($query_str);
		return $query;
		
	}
	
	function get_trans_att_nolimit(){
		
		$query_str = "SELECT id_trans, cmd_trans, method_payment_trans, num_autorisation, frais_trans, date_trans 
		FROM transaction 
		JOIN `commandes` ON id_cmd = cmd_trans
		where statut_cmd Like 'En Attente'";
		
		$query = $this->db->query($query_str);
		return $query;
		
	}
	
	function get_trans_ann($limit,$offset){
		
		$query_str = "SELECT id_trans, cmd_trans, method_payment_trans, num_autorisation, frais_trans, date_trans 
		FROM transaction 
		JOIN `commandes` ON id_cmd = cmd_trans
		where statut_cmd Like 'Annul%'
		LIMIT $offset , $limit";
		
		$query = $this->db->query($query_str);
		return $query;
		
	}
	
	function get_trans_ann_nolimit(){
		
		$query_str = "SELECT id_trans, cmd_trans, method_payment_trans, num_autorisation, frais_trans, date_trans 
		FROM transaction 
		JOIN `commandes` ON id_cmd = cmd_trans
		where statut_cmd Like 'Annul%'";
		
		$query = $this->db->query($query_str);
		return $query;
		
	}
	
	function drop_trans($id_trans){
		
		$this->db->where('id_trans', $id_trans);
		$this->db->delete('transaction'); 
	}
	

}

?>