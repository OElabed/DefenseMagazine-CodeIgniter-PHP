<div id="table_inscrire">



<?php
					echo form_open('compte',array('name' =>'inscrire'));
					
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
					
					$input_email = array(
						              'name'        => 'email',
						              'value'		=> set_value('email'),
						              'maxlength'   => '100',
						              'size'        => '25',
						            );
					$input_tel = array(
						              'name'        => 'tel',
						              'value'		=> set_value('tel'),
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
									

				?>



<table border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr class="entete_tb">
      <td colspan="2" rowspan="1">Nouveau Client</td>
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
			<?php foreach($list_drap as $row){ ?>
			<option value="<?php echo $row->nom_mon;?>"><?php echo $row->nom_mon;?></option>
		<?php }?>
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
	  	<input type="checkbox" name ="newsletter" value="abonner" /><b> &nbsp;&nbsp;Je m'abonne à la newsletter</b>
	  </td>
    </tr>
    <tr class="submit_connexion">
      <td colspan="2" rowspan="1"> <input type="submit" name="submit_inscrire" class="submit_inscrire"/></td>
    </tr>
  </tbody>
</table>

<?php echo form_close();?>

</div>

<div id="pour_insc">
<h1>Pourquoi s'inscrire ?</h1>
<p>Votre compte vous permettra de bénéficier des services du site tels que :</p>

<table cellpadding="2">
	<tr>
		<td width="20%"><img src="<?php echo base_url(); ?>img/insPictoNewsletter.png" alt="connect" border="0" /></td>
		<td>S'abonner aux Newsletters</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><img src="<?php echo base_url(); ?>img/insPictoCommande.png" alt="connect" border="0" /></td>
		<td>Suivre le traitement de vos commandes</td>
	</tr>
</table>


</div>