<?php

class  Commande_model extends CI_Model {


	function get_all_cmd($statut){
		$query = $this->db->query("select * from commandes WHERE statut_cmd = '$statut' ");
		return $query;
	}


	
 function get_cmd($id_cmd){
	
		$query_str = "SELECT * FROM commandes WHERE id_cmd  = '$id_cmd'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$cmd_tr['id_cmd'] = $row->id_cmd;
		$cmd_tr['total_uni_cmd'] = $row->total_uni_cmd ;
		$cmd_tr['client_cmd'] = $row->client_cmd ;
		$cmd_tr['adr_livraison_cmd'] = $row->adr_livraison_cmd;
		$cmd_tr['adr_facturation_cmd'] = $row->adr_facturation_cmd;
		$cmd_tr['method_expedit_cmd'] = $this->get_meth_exp($row->method_expedit_cmd); 
		$cmd_tr['frais_livraison_cmd'] = $row->frais_livraison_cmd;
		$cmd_tr['total_payer_cmd'] = $row->total_payer_cmd;
		$cmd_tr['method_pay_cmd'] = $this->get_meth_pay($row->method_pay_cmd);
		$cmd_tr['date_cmd'] = $row->date_cmd;
		$cmd_tr['statut_cmd'] = $row->statut_cmd;
		}
		return $cmd_tr;
	}
	

function get_cmd_action($id_cmd){
	
	$query = $this->db->query("select * from action_cmd where id_cmd = $id_cmd ");
		return $query->result();
}


function get_cmd_prod($id_cmd){
	
	$query = $this->db->query("SELECT quantite_prod_vente,nom_categorie, titre_produit, prix_uni_produit FROM ventes JOIN produit ON id_product_vente = id_produit INNER JOIN sous_categorie ON categorie_produit = id_categorie WHERE id_cmd_vente  = '$id_cmd'");
		return $query->result();
}


function get_meth_pay($id_pay){
		$query_str = "SELECT * FROM payment_method WHERE id_method_pay = '$id_pay'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$name = $row->name_method_pay;
		}
		return $name;
}

function get_meth_exp($id_exp){
		$query_str = "SELECT * FROM method_expedition WHERE id_expedit = '$id_exp'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$name = $row->nom_expedit;
		}
		return $name;
}



function update_cmd_statut ($id_cmd,$N_statut,$cli_avert,$comment){
	
		$data = array(
               'statut_cmd' => $N_statut
			    );
		
		$this->db->where('id_cmd', $id_cmd);
		$this->db->update('commandes', $data); 
		
		
		$data = array(
				   'id_cmd' => $id_cmd,
				   'statut_action' => $N_statut,
				   'client_averti' => $cli_avert,
				   'comments' => $comment
				    
					);

		$this->db->insert('action_cmd', $data);
	}
	
	
	function drop_cmd_commande($id_cmd){
		
		$this->db->where('id_cmd', $id_cmd);
		$this->db->delete('commandes'); 
		
		
	}
	
	function drop_cmd_action($id_cmd){
		
		$this->db->where('id_cmd', $id_cmd);
		$this->db->delete('action_cmd'); 
		
		
	}
		
		
}














?>