<div class="etat_cmd">
        <ul>
		<li class="done"><font style="margin-left:15px;">Authentification</font></li>
		<li class="done"><font style="margin-left:15px;">Coordonnées</font></li>
		<li class="done"><font style="margin-left:15px;">Expédition</font></li>
		<li class="current"><font style="margin-left:15px;">Paiement</font></li>	
		</ul>
</div>



<div id="table_connexion" style="width:700px;">






<table border="0" cellpadding="2" cellspacing="2" style="width:704px;">
  
  <tbody>
    <tr class="entete_tb" >
      <td colspan="2" rowspan="1">Méthode de paiement</td>
    </tr>
	

	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		
						<div  class="table_tout_cmd">
						<table class="tab">
						 	
						   
						
							<tr>
							<?php 
							$monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
							
							
							$exped = $this->Commande_model->get_exped_data($cmd_data['method_expedit_cmd']);?>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" ><b>Type d'expédition</b></td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" ><b><?php echo $exped['nom_expedit'].' <font size="1">'.$exped['societe'].'</font>'?></b></td>
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
						  
						    <?php 
							    $cart = $this->cart->contents();
							    foreach ($cart as $item):
								$prod_pn = $this->Produit_model->get_produit($item['id']);
							?>
						    <tr>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;">
							  <a href="<?php echo base_url().'produit/produit_affiche/'.$prod_pn['id_produit'];?>"><?php echo $prod_pn['titre_produit']; ?></a><br />
							  <?php echo $prod_pn['editeur_produit']; ?>
							  </td>
						      <td class="int" align="center" style="font-size:12px;"><?php echo $item['qty']; ?></td>
						      <td class="int" align="center" style="font-size:12px;"><b><?php echo number_format($prod_pn['prix_uni_produit']*$mult, 2); ?> <?php echo $mon_type;?></b></td>
						      <td class="int" align="right" style="padding-right:20px;font-size:12px;"><b><?php echo number_format($item['subtotal']*$mult, 2); ?> <?php echo $mon_type;?></b></td>
						    </tr>
							<?php endforeach; ?>
							<tr>
								<td class="int" align="right" style="font-size:12px;" colspan="3" rowspan="1"><b>Sous-Total &nbsp;</b></td>
								<td class="int" align="right" style="font-size:12px;" ><b><?php echo number_format($this->cart->total()*$mult, 2); ?> <?php echo $mon_type;?></b></td>
							</tr>
							<tr>
								<td class="int" align="right" style="font-size:12px;"  colspan="3" rowspan="1"><b>Frais de livraison &nbsp;</b></td>
								<td class="int" align="right" style="font-size:12px;" ><b><?php echo number_format($cmd_data['frais_livraison_cmd']*$mult, 2); ?> <?php echo $mon_type;?></b></td>
							</tr>
							<tr>
								<td class="int" align="right" style="font-size:12px;"  colspan="3" rowspan="1"><b>Frais d'emballage &nbsp;</b></td>
								<td class="int" align="right" style="font-size:12px;" ><b><?php echo number_format(1.00*$mult, 2); ?> <?php echo $mon_type;?></b></td>
							</tr>
							<tr>
								<td class="int" align="right" style="font-size:15px;" colspan="3" rowspan="1"><b>Total de votre commande &nbsp;</b></td>
								<td class="int" align="right" style="font-size:15px;"><b><?php echo number_format(($this->cart->total()+$cmd_data['frais_livraison_cmd']+1*$mult), 2); ?> <?php echo $mon_type;?></b></td>
							</tr>
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
							  	<?php $adr_liv = $this->Commande_model->get_adresse($cmd_data['adr_liv']);?>
							    <b>Adresse de Livraison</b><br />
							    <?php echo $adr_liv['prenom_adr'].' '.$adr_liv['nom_adr'];?><br />
							    <?php echo $adr_liv['adresse_adr'];?><br />
							    <?php echo $adr_liv['codepostal_adr'].' '.$adr_liv['ville_adr'].', '.$adr_liv['pays_adr'];?><br />
							    Téléphone : <?php echo $adr_liv['tel_adr'];?>

							  </td>
						      <td class="int" align="left" style="padding-left:20px;font-size:12px;" >
							  <?php $adr_fact = $this->Commande_model->get_adresse($cmd_data['adr_fct']);?>
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
	  
	   <script language="JavaScript">
									 	
										function validation(){
										document.forms["choix_payment"].submit();
										}
										</script>
		  
		  <div class="input_connexion" style="margin-left:30px;margin-top:10px;width:600px;height:30px;font-size:13px;">
						Veuillez choisir la méthode de paiement pour cette commande
					</div>
		  <?php echo form_open('commande/payment_submit',array('name' =>'choix_payment'));?>
		  
		  
		  <table style="margin-left:100px;width:460px;border: 1px solid #c0c0c0;height:50px">
						<tr  class="input_connexion">
							<td style="padding-left:20px;">
							Par carte bancaire<br />
							<p style="font-size:11px;font-weight:normal;"></p>
							</td>
							<td><input type="radio" name="choix_pay" value="1" checked="checked"/></td> 
						</tr>
						<tr  class="input_connexion">
							<td style="padding-left:20px;">
							Par e-dinar<br />
							<p style="font-size:11px;font-weight:normal;"></p>
							</td>
							<td><input type="radio" name="choix_pay" value="2"/></td>  
						</tr>
					</table>
		  <?php echo form_hidden('montant_total',number_format(($this->cart->total()+$cmd_data['frais_livraison_cmd']+1), 2));?>
		  			<table style="height:40px;">
					<tr>
						<td  colspan="2" rowspan="1" align="center" style="padding-top:40px;">
							<a href="javascript:validation();"><img src="<?php echo base_url();?>img/valider.png" alt="logo" border="0" /></a>
						</td>
					</tr>
				</table>
		  <?php echo form_close(); ?>
		  
		  
		  
	  </div>
	  </td>
    </tr>
    </tr>
  </tbody>
</table>


</div>
