<h1>Recherche Avancée </h1>
<img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
<br/><br/>
<div id="table_connexion" style="width:700px;">
<table border="0" cellpadding="2" cellspacing="2" style="width:704px;">
  
  <tbody>
 
	

	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		
				<script language="JavaScript">
									 	
										function validation_rech_av(){
										document.forms["recherche_av"].submit();
										}
										</script>
			
			
				<?php
					echo form_open('recherche/recherche_avance_submit',array('name' =>'recherche_av'));
					
					$input_titre = array(
						              'name'        => 'titre',
						              'value'		=> $mot_ch,
						              'maxlength'   => '50',
						              'size'        => '25',
						            );
					
					
					$input_date_paru = array(
								              'name'        => 'date_paru',
								              'value'       => ' dd/mm/yyyy',  
								              'maxlength'   => '50',
								              'size'        => '16',
								            );
					$input_editeur = array(
								              'name'        => 'editeur',
								              'value'       => '',  
								              'maxlength'   => '50',
								              'size'        => '25',
								            );
					$input_prix_min = array(
								              'name'        => 'prix_min',
								              'value'       => '',  
								              'maxlength'   => '10',
								              'size'        => '5',
								            );
					$input_prix_max = array(
								              'name'        => 'prix_max',
								              'value'       => '',  
								              'maxlength'   => '10',
								              'size'        => '5',
								            );
									
									

				?>
				<?php include_once("date_edit.php");?>
			
			
			
			<table>
			
		    <tr class="input_connexion">
		      <td width="38%">Titre</td>
		      <td><?php echo form_input($input_titre); ?></td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Editeur</td>
		      <td><?php echo form_input($input_editeur); ?></td>
		    </tr>
			<tr class="input_connexion">
		      <td width="38%">Catégorie</td>
		      <td>
			  		<select name="categ">
								<option value=" " selected="selected" style="width:100px;"></option>
								<?php 
									
									foreach($categ['list_categ_a'] as $row){
										echo '<option value="'.$row->id_categorie.'">'.$row->nom_categorie.'</option>';
									}
								
								?>
													
					</select>
			  </td>
		    </tr>	
			
			
			<tr class="input_connexion">
		      <td width="38%">Date de parution</td>
		      <td><?php echo form_input($input_date_paru); ?></td>
		    </tr>
			
			<tr class="input_connexion">
		      <td width="38%">Prix</td>
		      <td>min &nbsp;<?php echo form_input($input_prix_min); ?> &nbsp;&nbsp;&nbsp;max &nbsp;<?php echo form_input($input_prix_max); ?></td>
		    </tr>
						
			
		    <tr>
				<td  colspan="2" rowspan="1" align="center" style="padding-top:40px;">
					<a href="javascript:validation_rech_av();"><img src="<?php echo base_url();?>img/valider.png" alt="logo" border="0" /></a>
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