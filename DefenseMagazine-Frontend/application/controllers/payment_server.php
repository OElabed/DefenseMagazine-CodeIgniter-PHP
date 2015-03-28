<?php

class Payment_server extends CI_Controller {

	function __construct(){
		
	
		parent::__construct();
		$this->load->model('Payment_model');
	}

	
	
	function index(){
	
		$cmd_data = $this->session->userdata('cmd_data');
	
		if($cmd_data['method_pay_cmd']== 1){
			$data['montant']= $cmd_data['Montant_total'];
			$data['Reference']= $this->generer_reference();
			$data['Affilie']='12DDFGGE4556DZ6ZZ000N';
			$this->load->view('sps_server/server_sps',$data);
		}
		if($cmd_data['method_pay_cmd']== 2){
			$data['montant']= $cmd_data['Montant_total'];
			$data['Reference']= $this->generer_reference();
			$data['object']= 'Vente des magazines de Défense National en ligne';
			$data['Affilie']='12DDFGGE4556DZ6ZZ000N';
			$cli = $this->Payment_model->get_nom_cli($this->session->userdata('login'));
			$data['nom_cli'] = $cli['prenom_client'].' '.$cli['nom_client'];
			$data['profit']= 'Ministére de Défense National';
			$data['date_trans'] = date("d/m/Y");
			$this->load->view('poste_server/server_poste',$data);
		}
	
	
	}
	
	
	
	
	
	private function generer_reference($nb_caractere = 15){
		
        $ref = "";
       
        $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $longeur_chaine = strlen($chaine);
       
        for($i = 1; $i <= $nb_caractere; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $ref .= $chaine[$place_aleatoire];
        }

        return $ref;   
	}




}
?>