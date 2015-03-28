<?php

class  Compte_model extends CI_Model {





	function get_produit($id_prod){
	
		
		$query_str = "SELECT id_produit, nom_categorie, date_ajout_produit,quantite_produit, titre_produit, Date_parution_produit, prix_uni_produit, url_image, resum_produit ,editeur_produit,ISBN_produit ,nbre_page_produit ,poids_produit ,sommaire_produit
FROM `produit`
JOIN `sous_categorie` ON id_categorie = categorie_produit
JOIN `images` ON id_image = id_tof_produit
WHERE id_produit ='$id_prod'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		foreach($list as $row){
		$produit_tr['id_produit'] = $row->id_produit;
		$produit_tr['date_ajout_produit'] = date("F j, Y ", strtotime($row->date_ajout_produit));
		$produit_tr['date_ajout_produit_sans'] = $row->date_ajout_produit;
		$produit_tr['nom_categorie'] = $row->nom_categorie;
		$produit_tr['titre_produit'] = $row->titre_produit;
		$produit_tr['editeur_produit'] = $row->editeur_produit;
		$produit_tr['ISBN_produit'] = $row->ISBN_produit;
		$date = $row->Date_parution_produit;
		$date = explode('-',$date);				
		$produit_tr['Date_parution_produit'] = $date[2].'/'.$date[1].'/'.$date[0];
		$produit_tr['nbre_page_produit'] = $row->nbre_page_produit;
		$produit_tr['poids_produit'] = $row->poids_produit;
		$produit_tr['sommaire_produit'] = $row->sommaire_produit;
		$produit_tr['resum_produit'] = $row->resum_produit;
		$produit_tr['prix_uni_produit'] = $row->prix_uni_produit;
		$produit_tr['url_image'] = $row->url_image;
		$produit_tr['quantite_produit'] = $row->quantite_produit;
							
		}
		return $produit_tr;
		
	}

	function get_list_cmd($email){
		$query_str = "
		select id_cmd,total_payer_cmd,date_cmd,statut_cmd 
		from commandes
		join client
		on client_cmd = id_client
		where email_client = '$email'
		ORDER BY date_cmd DESC 
		";
		$query = $this->db->query($query_str);
		
		return $query;
	}
	
	function get_list_cmd_nouv($email,$limit){
		$query_str = "
		select id_cmd,total_payer_cmd,date_cmd,statut_cmd 
		from commandes
		join client
		on client_cmd = id_client
		where email_client = '$email'
		ORDER BY date_cmd DESC
		LIMIT 0 , $limit 
		";
		$query = $this->db->query($query_str);
		
		return $query;
	}
	
	function get_client_email($email){
	$query_str = "
		select * from client where email_client = '$email'
		";
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
		$client_tr['pays_monnaie'] = $row->pays_monnaie;	
		}
		return $client_tr;
		
	}
	
	
	function get_cmd_details($id_cmd){
		
		$query_str = "SELECT id_cmd, adr_livraison_cmd, adr_facturation_cmd, frais_livraison_cmd, total_payer_cmd, date_cmd, statut_cmd, nom_expedit, method_expedition.societe AS societe_exp, name_method_pay, payment_method.societe AS societe_pay
		FROM commandes
		JOIN `method_expedition` ON method_expedit_cmd = id_expedit
		JOIN `payment_method` ON id_method_pay = method_pay_cmd
		WHERE id_cmd = $id_cmd
		";
		$query = $this->db->query($query_str);
		
		
		foreach($query->result() as $row){
		$cmd_details['id_cmd'] = $row->id_cmd;
		$cmd_details['frais_livraison_cmd'] = $row->frais_livraison_cmd ;
		$cmd_details['total_payer_cmd'] = $row->total_payer_cmd ;
		$cmd_details['date_cmd'] = $row->date_cmd;
		$cmd_details['statut_cmd'] = $row->statut_cmd;
		$cmd_details['nom_expedit'] = $row->nom_expedit;
		$cmd_details['societe_exp'] = $row->societe_exp;
		$cmd_details['name_method_pay'] = $row->name_method_pay;
		$cmd_details['societe_pay'] = $row->societe_pay;
		$cmd_details['adr_livraison_cmd'] = $row->adr_livraison_cmd;
		$cmd_details['adr_facturation_cmd'] = $row->adr_facturation_cmd;
		}
		return $cmd_details;
	}
	
	
	function get_cmd_prod($id_cmd){
		
		$query_str = "SELECT id_produit, titre_produit, editeur_produit, prix_uni_produit, quantite_prod_vente
					FROM commandes
					JOIN `ventes` ON id_cmd_vente = id_cmd
					JOIN `produit` ON id_product_vente = id_produit
					WHERE id_cmd =$id_cmd
					";
		$query = $this->db->query($query_str);
		
		return $query;
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
	
	






}


?>