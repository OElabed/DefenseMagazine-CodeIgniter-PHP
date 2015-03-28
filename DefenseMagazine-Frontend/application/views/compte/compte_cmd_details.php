<div id="table_connexion" style="width:700px;">






<table border="0" cellpadding="2" cellspacing="2" style="width:704px;">
  
  <tbody>
    <tr class="entete_tb" >
      <td colspan="2" rowspan="1">Mon compte</td>
    </tr>
	

	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		<h4>Détail commande N°<?php echo $cmd_details['id_cmd']?></h4>
						<div  class="table_tout_cmd">
						<table class="tab">
						 	
						    <tr>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >Date d'enregistrement</td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" ><?php echo $cmd_details['date_cmd']?></td>
						    </tr>
							<tr>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >État</td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >
							  <?php
							  
							  
							  $monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon']; 
							  if($cmd_details['statut_cmd'] == 'Livré' ){
							  	echo '<font color="green">'.$cmd_details['statut_cmd'].'</font>';
							  }else{
							  	echo '<font color="red">'.$cmd_details['statut_cmd'].'</font>';
							  }
							   
							   ?>
							  
							  </td>
						    </tr>
							<tr>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >Type d'expédition</td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" ><?php echo $cmd_details['nom_expedit'].' <font size="1">'.$cmd_details['societe_exp'].'</font>'?></td>
						    </tr>
							<tr>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >Montant total TTC</td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" ><b><?php echo number_format($cmd_details['total_payer_cmd']*$mult, 2)?> <?php echo $mon_type;?></b></td>
						    </tr>
							<tr>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >Méthode de paiement</td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" ><?php echo $cmd_details['name_method_pay']?></td>
						    </tr>
							
						  </table>
						</div>
	  	
	  
	  </div>
	  <!---->
	  
	  </td>
    </tr>
	
	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		<h4>Traitement de la commande</h4>
						<div  class="table_tout_cmd">
						<table class="tab">
						 	
						    <tr>
						      <th class="inth" align="left" style="padding-left:20px;font-size:12px;" >Articles</th>
						      <th class="inth" align="center" style="font-size:12px;">Quantité servie</th>
						      <th class="inth" align="center" style="font-size:12px;">Prix Unitaire</th>
						      <th class="inth" align="right" style="padding-right:20px;font-size:12px;">Montant</th>
							 </tr>
						  
						    <?php foreach($list_prod_cmd->result() as $row){
						  
						  ?> 
						    <tr>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;">
							  <a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><?php echo $row->titre_produit; ?></a><br />
							  <?php echo $row->editeur_produit; ?>
							  </td>
						      <td class="int" align="center" style="font-size:12px;"><?php echo $row->quantite_prod_vente; ?></td>
						      <td class="int" align="center" style="font-size:12px;"><b><?php echo number_format($row->prix_uni_produit*$mult, 2); ?> <?php echo $mon_type;?></b></td>
						      <td class="int" align="right" style="padding-right:20px;font-size:12px;"><b><?php echo number_format(($row->prix_uni_produit * $row->quantite_prod_vente)*$mult, 2); ?> <?php echo $mon_type;?></b></td>
						    </tr>
							<?php }
							?>
						  </table>
						</div>
	  	
	  
	  </div>
	  <!---->
	 
	  </td>
	  
	  <tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		<h4>Adresses de livraison et de facturation</h4>
						<div  class="table_tout_cmd">
						<table class="tab">
						 	
						    <tr style="height:100px;">
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" width="50%" >
							    <b>Adresse de Livraison</b><br />
							    <?php echo $adr_liv['prenom_adr'].' '.$adr_liv['nom_adr'];?><br />
							    <?php echo $adr_liv['adresse_adr'];?><br />
							    <?php echo $adr_liv['codepostal_adr'].' '.$adr_liv['ville_adr'].', '.$adr_liv['pays_adr'];?><br />
							    Téléphone : <?php echo $adr_liv['tel_adr'];?>

							  </td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >
							  	<b>Adresse de Facturation</b><br />
							    <?php echo $adr_fact['prenom_adr'].' '.$adr_fact['nom_adr'];?><br />
							    <?php echo $adr_fact['adresse_adr'];?><br />
							    <?php echo $adr_fact['codepostal_adr'].' '.$adr_fact['ville_adr'].', '.$adr_fact['pays_adr'];?><br />
							    Téléphone : <?php echo $adr_fact['tel_adr'];?>
							  
							  </td>
						    </tr>
							
						  </table>
						</div>
	  	
	  
	  </div>
	  
	  <!---->
	  <div id="table_gerer_affiche">
		  <div class="retour_liste">
			<a href="<?php echo base_url();?>compte/voir_compte_cmd"><b>»</b> Retour à la liste des commandes</a>
		  </div>
	  </div>
	  </td>
    </tr>
    </tr>
  </tbody>
</table>


</div>
