
<div id="table_connexion">

<script language="JavaScript">
									 	
			function validation(){
			document.forms["abonner"].submit();
			}
</script>

<?php
					echo form_open('News_letter/abonner',array('name' =>'abonner'));
					
					$input_nom = array(
						              'name'        => 'nom',
						              'value'		=> set_value('nom'),
						              'maxlength'   => '50',
						              'size'        => '20',
						            );
					
					$input_prenom = array(
						              'name'        => 'prenom',
						              'value'		=> set_value('prenom'),
						              'maxlength'   => '50',
						              'size'        => '20',
						            );
					
					$input_email = array(
						              'name'        => 'email',
						              'value'		=> set_value('email'),
						              'maxlength'   => '100',
						              'size'        => '25',
						            );
					
									

				?>



<table border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr class="entete_tb">
      <td colspan="2" rowspan="1">S'abonner à Newsletter</td>
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
	
    <tr>
      <td width="38%"></td>
      <td style="color:#999;"><i>  &nbsp;&nbsp;* Champs Obligatoire</i></td>
    </tr>
	<tr>
      <td colspan="2" rowspan="1"></td>
    </tr>
    <td  colspan="2" rowspan="1" align="center" style="padding-top:40px;">
					<a href="javascript:validation();"><img src="<?php echo base_url();?>img/valider.png" alt="logo" border="0" /></a>
				</td>
  </tbody>
</table>

<?php echo form_close();?>

</div>


<br/><br/>

<div id="nouveau">
            <h1>Les nouveautés</h1>
            <img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
            
            <P>&nbsp;</P>
                    
				<div id="carousel">
				  <div class="list_carousel">
					<ul id="user_interaction">
						 <?php foreach($list_nouveau->result() as $row) {?>
					 	 <li><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$row->url_image;?>" alt="<?php echo $row->titre_produit;?>" /></a></li>
						 <?php } ?>
						
					</ul>
					
					<a id="prev1" href="#"><img src="<?php echo base_url();?>img/arrow-prev1.png" alt="prev" /></a>
					<a id="next1" href="#"><img src="<?php echo base_url();?>img/arrow-next1.png" alt="next" /></a>
				</div>
                
               
                    <div id="tout_nouv"><a href="<?php echo base_url();?>acceuil/nouveaute">Toutes nos nouveautés</a>...</div>
			</div>
            
            <P>&nbsp;</P>
          </div>
