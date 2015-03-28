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
	  		<?php
					echo form_open('compte/voir_compte_pers',array('name' =>'inscrire'));
					
					$input_nom = array(
						              'name'        => 'nom',
						              'value'		=> $client['nom_client'],
						              'maxlength'   => '50',
						              'size'        => '25',
						            );
					
					$input_prenom = array(
						              'name'        => 'prenom',
						              'value'		=> $client['prenom_client'],
						              'maxlength'   => '50',
						              'size'        => '25',
						            );
					
					$input_email = array(
						              'name'        => 'email',
						              'value'		=> $client['email_client'],
						              'maxlength'   => '100',
						              'size'        => '25',
						            );
					$input_tel = array(
						              'name'        => 'tel',
						              'value'		=> $client['tel_client'],
						              'maxlength'   => '20',
						              'size'        => '25',
						            );
									
					$input_password = array(
						              'name'        => 'password',
									  'type'		=> 'password',
						              'value'       => '',
						              'maxlength'   => '300',
						              'size'        => '25',
						            );
									
					$input_password_vf = array(
						              'name'        => 'password_vf',
									  'type'		=> 'password',
						              'value'       => '',
						              'maxlength'   => '300',
						              'size'        => '25',
						            );
					 echo form_hidden('id_client',$client['id_client']);				

				?>
	  
					  	<h4>Modifier mes donn&eacute;es personnelles</h4>
						<div  class="table_tout_cmd">
						<table class="tab">						  
						    <tr class="input_connexion">
							      <td width="38%">Nom*</td>
							      <td><?php echo form_input($input_nom); ?> <font class="default"><?php echo form_error('nom');?></font></td>
							    </tr>
								<tr class="input_connexion">
							      <td width="38%">Prénom*</td>
							      <td><?php echo form_input($input_prenom); ?> <font class="default"><?php echo form_error('prenom');?></font></td>
							    </tr>
								<tr class="input_connexion">
							      <td width="38%">Email*</td>
							      <td><?php echo form_input($input_email); ?> <font class="default"><?php echo form_error('email');?></font></td>
							    </tr>
								<tr class="input_connexion">
							      <td width="38%">Téléphone*</td>
							      <td><?php echo form_input($input_tel); ?> <font class="default"><?php echo form_error('tel');?></font></td>
							    </tr>
								<tr class="input_connexion">
							      <td width="38%">Affichage des prix*</td>
							      <td>
								  	<select name="tarif" style="width:100px;">
									<option value="<?php echo $client['pays_monnaie'];?>" selected="selected"><?php echo $client['pays_monnaie'];?></option>
										<?php foreach($list_drap as $row){
										
										 ?>
										<option value="<?php echo $row->nom_mon;?>"><?php echo $row->nom_mon;?></option>
									<?php }
									?>
									</select>
								  </td>
							    </tr>
								<tr>
							      <td colspan="2" rowspan="1" height="20px"></td>
							    </tr>
								<tr class="input_connexion">
							      <td width="38%">Mot de passe*</td>
							      <td><?php echo form_input($input_password); ?> <font class="default"><?php echo form_error('password');?></font></td>
							    </tr>
								
								<tr class="input_connexion">
							      <td width="38%">Confirmation du mot de passe*</td>
							      <td><?php echo form_input($input_password_vf); ?> <font class="default"><?php echo form_error('password_vf');?></font></td>
							    </tr>
								
							    <tr>
							      <td width="38%"></td>
							      <td style="color:#999;"><i>  &nbsp;&nbsp;* Champs Obligatoire</i></td>
							    </tr>
								<tr>
							      <td colspan="2" rowspan="1"></td>
							    </tr>
								<tr class="input_connexion">
							      <td colspan="2" rowspan="1">
								  	<?php if($client['newsletter_client']==1) {?>
									<input type="checkbox" name ="newsletter" value="abonner" checked="checked"/><b> &nbsp;&nbsp;Je m'abonne à  la newsletter</b>
									<?php }
										else{
										
									?>
									<input type="checkbox" name ="newsletter" value="abonner" /><b> &nbsp;&nbsp;Je m'abonne à  la newsletter</b>
									<?php } ?>
								  </td>
							    </tr>
								<tr class="submit_connexion">
							      <td colspan="2" rowspan="1"> <input type="submit" name="submit_modif_compte" class="submit_conn_mod"/></td>
							    </tr>
							
						  </table>
						</div>
	  	
	  
	  </div>
	  <!---->
	 
	  <!----> 
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </tbody>
</table>


</div>
