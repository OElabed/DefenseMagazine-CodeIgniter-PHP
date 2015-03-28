<div class="etat_cmd">
        <ul>
		<li class="done"><font style="margin-left:15px;">Authentification</font></li>
		<li class="done"><font style="margin-left:15px;">Coordonnées</font></li>
		<li class="current"><font style="margin-left:15px;">Expédition</font></li>
		<li class="next"><font style="margin-left:15px;">Paiement</font></li>	
		</ul>
</div>



<div id="table_connexion" style="width:700px;">






<table border="0" cellpadding="2" cellspacing="2" style="width:704px;">
  
  <tbody>
    <tr class="entete_tb" >
      <td colspan="2" rowspan="1">Méthode d'expédition</td>
    </tr>
	

	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  
									  <script language="JavaScript">
									 	
										function validation(){
										document.forms["choix_exped"].submit();
										}
										</script>
	  
	  
	  
	  		<?php 
			
			$monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
			echo form_open('commande/expedition_submit',array('name' =>'choix_exped'));?>
		<table>
			<tr>
				<td>
				
					<div id="gerer_compte" style="width:600px">
					
						<table>
							<tr>
								<td class="adr_div" style="padding-left:20px;font-size:12px;" width="72%">
									La livraison est effectuée soit par <b style="color:#FE6700;">la Poste Tunisienne</b> soit par <b style="color:#FE6700;">Rapid Poste</b>.<br /><br />

									Les frais de transport sont calculés en fonction d'emplacement et poids de chaque commande.
 
								</td>
								<td style="padding-bottom:10px;padding-left:25px;">
									<img src="<?php echo base_url();?>img/poste.gif" alt="fleche" border="0"/>
								</td>
							</tr>
						</table>					
					
					</div>
					<div class="input_connexion" style="margin-left:30px;margin-top:50px;width:600px;height:30px;font-size:13px;">
						Veuillez choisir la méthode d'expédition préférée à utiliser pour cette commande
					</div>
					
					<table style="margin-left:20px;width:600px;border: 1px solid #c0c0c0;">
						<tr  class="input_connexion">
							<td style="padding-left:20px;">
							Livraison normale par colis postal<br />
							<p style="font-size:11px;font-weight:normal;"><u><?php echo $delais_standars;?></u></p>
							</td>
							<td><?php echo  number_format($frais_standard*$mult, 2);?> <?php echo $mon_type;?></td>
							<td><input type="radio" name="choix_exped" value="1" checked="checked"/></td>
							<?php echo form_hidden('frais_standard',number_format($frais_standard, 2));?>  
						</tr>
						<tr  class="input_connexion">
							<td style="padding-left:20px;">
							Livraison rapide par colis rapid poste<br />
							<p style="font-size:11px;font-weight:normal;"><u><?php echo $delais_rapide;?></u></p>
							</td>
							<td><?php echo  number_format($frais_rapide*$mult, 2);?> <?php echo $mon_type;?></td>
							<td><input type="radio" name="choix_exped" value="2"/></td>
							<?php echo form_hidden('frais_rapide',number_format($frais_rapide, 2));?>  
						</tr>
					</table>
					
				
				</td>
			</tr>
			 <tr>
				<td  colspan="2" rowspan="1" align="center" style="padding-top:40px;">
					<a href="javascript:validation();"><img src="<?php echo base_url();?>img/valider.png" alt="logo" border="0" /></a>
				</td>
			</tr>
		</table>
	  	<?php echo form_close(); ?>
	  
	  </div>
	  <!---->
	 
	  <!----> 
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </tbody>
</table>


</div>
