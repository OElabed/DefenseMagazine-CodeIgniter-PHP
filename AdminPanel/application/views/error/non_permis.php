<?php $this->load->view('login/login_header');?>



<div id="login_form">
<h1>T.Bord d'Administration</h1>

<table border="0" style="margin-left:30px; margin">
	<tr>
		<td align="right" style="float:right;"><h5>Vous n'etes pas permis pour entrez dans cette page</h5></td>
	</tr>
	
	<tr>
		<td><?php echo form_submit('submit','Login');?> </td>
	</tr>
	
</table>

</div>





<?php $this->load->view('login/login_footer');?>