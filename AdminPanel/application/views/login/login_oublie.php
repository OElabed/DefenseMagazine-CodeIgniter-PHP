<div id="login_form">
<h1>T.Bord d'Administration</h1>

<?php echo form_open('login/pass_oublie');?>

<table border="0" style="margin-left:30px; margin">
	<tr>
		<td align="right" style="float:right;"><h4>E-mail : </h4></td>
		<td class="input"><?php echo form_input('email',''); ?> <font class="default"><?php echo form_error('email');?></font></td>
	</tr>
	<tr>
		<td> </td>
		<td><?php echo form_submit('submit','envoi');?></td>
		<?php echo form_close();?>
	</tr>
	<tr>
		<td> <div class="oublie">
          	<?php echo anchor('login','&lt; Retour'); ?>
          </div></td>
		<td></td>
	</tr>
	
</table>

</div>