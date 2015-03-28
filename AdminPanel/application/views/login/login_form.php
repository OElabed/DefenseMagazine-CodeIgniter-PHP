<div id="login_form">
<h1>T.Bord d'Administration</h1>

<?php echo form_open('login/validation');?>

<table border="0" style="margin-left:30px; margin">
	<tr>
		<td align="right" style="float:right;"><h4>Login : </h4></td>
		<td class="input"><?php echo form_input('login','login'); ?></td>
	</tr>
	<tr>
		<td align="right" style="float:right;"><h4>Mot de passe : </h4></td>
		<td class="input"><?php echo form_password('password',"Password"); ?></td>
	</tr>
	<tr>
		<td> </td>
		<td><?php echo form_submit('submit','Login');?> 
		  <div class="oublie">
          	<?php echo anchor('login/pass_oublie','Mot de pass oublié?'); ?>
          </div>
	    </td>
		<?php echo form_close();?>
	</tr>
	
</table>

</div>