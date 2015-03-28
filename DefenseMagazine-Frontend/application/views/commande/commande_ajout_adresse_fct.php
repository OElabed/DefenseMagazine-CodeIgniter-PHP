<div class="etat_cmd">
        <ul>
		<li class="done"><font style="margin-left:15px;">Authentification</font></li>
		<li class="current"><font style="margin-left:15px;">Coordonnées</font></li>
		<li class="next"><font style="margin-left:15px;">Expédition</font></li>
		<li class="next"><font style="margin-left:15px;">Paiement</font></li>	
		</ul>
</div>



<div id="table_connexion" style="width:700px;">






<table border="0" cellpadding="2" cellspacing="2" style="width:704px;">
  
  <tbody>
    <tr class="entete_tb" >
      <td colspan="2" rowspan="1">Choix d'une adresse</td>
    </tr>
	

	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		
				<script language="JavaScript">
									 	
										function validation(){
										document.forms["ajout_adr"].submit();
										}
										</script>
			
			
				<?php
					echo form_open('commande/ajout_adr_fct',array('name' =>'ajout_adr'));
					
					$input_nom = array(
						              'name'        => 'nom',
						              'value'		=> set_value('nom'),
						              'maxlength'   => '50',
						              'size'        => '25',
						            );
					
					$input_prenom = array(
						              'name'        => 'prenom',
						              'value'		=> set_value('prenom'),
						              'maxlength'   => '50',
						              'size'        => '25',
						            );
					
					$input_codepostal = array(
						              'name'        => 'codepostal',
						              'value'		=> set_value('codepostal'),
						              'maxlength'   => '20',
						              'size'        => '20',
						            );
					$input_ville = array(
						              'name'        => 'ville',
						              'value'		=> set_value('ville'),
						              'maxlength'   => '50',
						              'size'        => '30',
						            );
					$input_tel = array(
						              'name'        => 'tel',
						              'value'		=> set_value('tel'),
						              'maxlength'   => '20',
						              'size'        => '20',
						            );
									
									

				?>

			
			
			
			<table>
			<tr colspan="2" rowspan="1" class="input_connexion">
				<td style="padding-bottom:30px;"><h4>Adresse de facturation</h4></td>
			</tr>
			<tr class="input_connexion">
		      <td width="38%">Civilité*</td>
		      <td>
			  	<select name="civilite" style="width: 60px">
						<option value="Mr" selected="selected">Mr</option>
						<option value="Mme">Mme</option>
						<option value="Mlle">Mlle</option>
				</select>
			  </td>
		    </tr>
		    <tr class="input_connexion">
		      <td width="38%">Nom*</td>
		      <td><?php echo form_input($input_nom); ?> <font class="default"><?php echo form_error('nom');?></font></td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Prénom*</td>
		      <td><?php echo form_input($input_prenom); ?> <font class="default"><?php echo form_error('prenom');?></font></td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Adresse*</td>
		      <td><textarea name="adresse" rows=1 COLS=50><?php set_value('adresse');?></textarea> <font class="default"><?php echo form_error('adresse');?></font></td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Codepostal*</td>
		      <td><?php echo form_input($input_codepostal);?> <font class="default"><?php echo form_error('codepostal');?></font></td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Ville*</td>
		      <td><?php echo form_input($input_ville); ?> <font class="default"><?php echo form_error('ville');?></font></td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Pays*</td>
		      <td>
			  	
					<select name="pays">
								<option value="Tunisie" selected="selected">Tunisie </option>
								<?php include_once("pays.php");?>
													
					</select>
			  
			  </td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Téléphone*</td>
		      <td><?php echo form_input($input_tel); ?> <font class="default"><?php echo form_error('tel');?></font></td>
		    </tr>
						
		    <tr>
		      <td width="38%"></td>
		      <td style="color:#999;"><i>  &nbsp;&nbsp;* Champs Obligatoire</i></td>
		    </tr>
			
		    <tr>
				<td  colspan="2" rowspan="1" align="center" style="padding-top:40px;">
					<a href="javascript:validation();"><img src="<?php echo base_url();?>img/valider.png" alt="logo" border="0" /></a>
				</td>
			</tr>
			<?php echo form_close(); ?>
			</table>




		
		
		
	  	
	  
	  </div>
	  <!---->
	 
	  <!----> 
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </tbody>
</table>


</div>
