<?php

class Poste_server extends CI_Controller {

	function __construct(){
		
	
		parent::__construct();
	}

	
	
	function index(){
	
		$cmd_data = $this->session->userdata('cmd_data');
	
		if($cmd_data['method_pay_cmd']== 1){
			$data['montant']= $cmd_data['Montant_total'];
			$data['Reference']= $this->generer_reference();
			$data['Affilie']='12DDFGGE4556DZ6ZZ000N';
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