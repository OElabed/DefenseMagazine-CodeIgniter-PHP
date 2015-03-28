<div id="table_connexion">



<?php
					echo form_open('compte',array('name' =>'connexion'));
					
					
					
					$input_email_conx = array(
						              'name'        => 'email_conx',
						              'value'		=> set_value('email'),
						              'maxlength'   => '100',
						              'size'        => '20',
						            );
									
					$input_password_conx = array(
						              'name'        => 'password_conx',
									  'type'		=> 'password',
						              'value'       => '',
						              'maxlength'   => '300',
						              'size'        => '20',
						            );
									

				?>




<table border="0" cellpadding="2" cellspacing="2">
  
  <tbody>
    <tr class="entete_tb">
      <td colspan="2" rowspan="1">Déjà client</td>
    </tr>
	<tr class="error_input">
      <td width="25%"></td>
      <td><font class="default"><?php echo $ch_error_insc;?></font></td>
    </tr>
    <tr class="input_connexion">
      <td width="25%">Adresse e-mail  </td>
      <td><?php echo form_input($input_email_conx); ?> <font class="default"><?php echo form_error('email_conx');?></font></td>
    </tr>
    <tr class="input_connexion">
      <td>Mot de passe  </td>
      <td><?php echo form_input($input_password_conx); ?> <font class="default"><?php echo form_error('password_conx');?></font></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"></td>
    </tr>
	 <tr class="pass_oublie">
      <td colspan="2" rowspan="1"><a href="">> Mot de passe oublié ?</a></td>
    </tr>
    <tr class="submit_connexion">
      <td colspan="2" rowspan="1"> <input type="submit" name="submit_connexion" class="submit_connexion"/></td>
    </tr>
  </tbody>
</table>
<?php echo form_close();?>

</div>