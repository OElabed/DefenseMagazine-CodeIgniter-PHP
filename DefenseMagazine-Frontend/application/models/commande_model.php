<?php

class  Commande_model extends CI_Model {




	
	function get_adr_client($email){
		$query_str = "SELECT adresse.id_adr as 'id_adr', civil_adr, nom_adr, prenom_adr, adresse_adr, codepostal_adr, ville_adr, pays_adr, tel_adr,TYPE
					FROM `adr_client`
					JOIN client ON client.id_client = adr_client.id_client
					JOIN adresse ON adresse.id_adr = adr_client.id_adresse
					WHERE email_client = '$email'
					ORDER BY adresse.date_ajout_adr DESC
					";
		$query = $this->db->query($query_str);
		return $query;
		
	}

	
	

	
	
function ajouter_adresse($adresse_aj,$id_client,$type){
		
		$adresse = array(
				   'civil_adr' => $adresse_aj['civil_adr'] ,
				   'nom_adr' => $adresse_aj['nom_adr'] ,
				   'prenom_adr' => $adresse_aj['prenom_adr'] ,
				   'adresse_adr' => $adresse_aj['adresse_adr'] ,
				   'codepostal_adr' => $adresse_aj['codepostal_adr'] ,
				   'ville_adr' => $adresse_aj['ville_adr'],
				   'pays_adr' => $adresse_aj['pays_adr'], 
				   'tel_adr' => $adresse_aj['tel_adr']
					);

		$this->db->insert('adresse', $adresse);
		$nom = $adresse_aj['nom_adr'];
		$pren = $adresse_aj['prenom_adr'];
		$adr = $adresse_aj['adresse_adr'];
		$tel = $adresse_aj['tel_adr'];
		
		
		$query_str = "SELECT id_adr FROM `adresse`
					WHERE (nom_adr = '$nom') and (prenom_adr = '$pren') and (adresse_adr = '$adr') and (tel_adr = '$tel') ";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$id_adr = $row->id_adr;
		}
		
		
		$adr_cli = array(
				   'id_adresse' => $id_adr ,
				   'id_client' => $id_client,
				   'type' => $type
					);

		$this->db->insert('adr_client', $adr_cli);
	return $id_adr;
		
	}


	function meme_adr_fct($id_adr,$id_client,$type){
			$adr_cli = array(
					   'id_adresse' => $id_adr ,
					   'id_client' => $id_client,
					   'type' => $type
						);
	
			$this->db->insert('adr_client', $adr_cli);
		
		
		
		
	}


	
function get_id_client($email){
	
		$query_str = "SELECT id_client FROM client WHERE email_client = '$email'";
		
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$client_id = $row->id_client;
		}
		return $client_id;
	}
	
	
	
	
function get_poids_prod($id_prod){
	$query_str = "SELECT poids_produit FROM produit WHERE id_produit = '$id_prod'";
		
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$poids = $row->poids_produit;
		}
		return $poids;
	}
	
	
	function get_pays_adr($id_adr){
		$query_str = "SELECT pays_adr FROM adresse WHERE id_adr = '$id_adr'";
		
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$pays = $row->pays_adr;
		}
		
		
		return $pays;
	}
	
	function get_exped_data($id_exped){
	
	$query_str = "SELECT * FROM method_expedition WHERE id_expedit = '$id_exped'";
		
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$data['nom_expedit'] = $row->nom_expedit;
		$data['societe'] = $row->societe;
		}
		
		
		return $data;
		
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
		$adresse_tr['tel_adr'] = $row->tel_adr;
		}
		return $adresse_tr;
	}
	
	
	function insert_cmd($id_cli,$cmd_aj,$list_prod,$ref_trans){
	
		$total =$cmd_aj['frais_livraison_cmd']+$cmd_aj['Montant_total_un']+1;
		$data_cmd = array(
				   'total_uni_cmd' => $cmd_aj['Montant_total_un'] ,
				   'client_cmd' => $id_cli ,
				   'adr_livraison_cmd' => $cmd_aj['adr_liv'] ,
				   'adr_facturation_cmd' => $cmd_aj['adr_fct'] ,
				   'method_expedit_cmd' => $cmd_aj['method_expedit_cmd'] ,
				   'frais_livraison_cmd' => $cmd_aj['frais_livraison_cmd'] ,
				   'total_payer_cmd' => $total ,
				   'method_pay_cmd' => $cmd_aj['method_pay_cmd'] ,
				   'statut_cmd' => 'En Attente' 
					);

		$this->db->insert('commandes', $data_cmd);		
	
		$id_cmd = $this->dernier_cmd($id_cli);
		
		
		foreach($list_prod as $item){
			
			$data_vente = array(
				   'id_product_vente' => $item['id'] ,
				   'quantite_prod_vente' => $item['qty'] ,
				   'id_cmd_vente' => $id_cmd 
					);

		$this->db->insert('ventes', $data_vente);	
		}
		
		$data_trans = array(
				   'cmd_trans' => $id_cmd  ,
				   'method_payment_trans' => $cmd_aj['method_pay_cmd'] ,
				   'num_autorisation' => $ref_trans ,
				   'frais_trans' => $cmd_aj['Montant_total'] 
					);

		$this->db->insert('transaction', $data_trans);	
		
		$data_act = array(
				   'id_cmd' => $id_cmd  ,
				   'client_averti' => FALSE ,
				   'statut_action' => 'En Attente' ,
				   'comments' => 'la commande est entrain de saisir.' 
					);

		$this->db->insert('action_cmd', $data_act);	
		
		
		
		return $id_cmd;
		
	}
	
	
	
	
	
	function dernier_cmd($id_cli){
		
		$query_str = "SELECT *
							FROM commandes
							WHERE client_cmd = $id_cli
							ORDER BY date_cmd DESC
							LIMIT 0 , 1";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$id_cmd = $row->id_cmd;
		}
		return $id_cmd;
		
	}
		
		
}














?>