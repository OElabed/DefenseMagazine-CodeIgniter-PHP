<div class="etat_cmd">
        <ul>
		<li class="done"><font style="margin-left:15px;">Authentification</font></li>
		<li class="current"><font style="margin-left:15px;">Coordonnées</font></li>
		<li class="next"><font style="margin-left:15px;">Expédition</font></li>
		<li class="next"><font style="margin-left:15px;">Paiement</font></li>	
		</ul>
</div>



<div id="table_connexion" style="width:700px;">

<script language="JavaScript">
									 	
			function validation(){
			document.forms["choix_adr"].submit();
			}
</script>



<?php echo form_open('commande/choix_adr_submit',array('name' =>'choix_adr'));?>


<table border="0" cellpadding="2" cellspacing="2" style="width:704px;">
  
  <tbody>
    <tr class="entete_tb" >
      <td colspan="2" rowspan="1">Choix d'une adresse</td>
    </tr>
	

	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		
		<table>
			<tr>
				<td width="50%" style="padding-left:20px;"><h4>Livraison</h4></td>
				<td style="padding-left:20px;"><h4>Facturation</h4></td>
			</tr>
			<tr>
				<td>
					<div id="gerer_compte" style="width:275px">
					<table>
						<tr>
							<td style="float:left;"><select id="thechoices1" name="adr_liv" style="width:263px;margin:5px;">
									<?php
										foreach ($list_adr->result() as $row){
											if($row->TYPE == 'livraison'){
									?>
									
										<option value="<?php echo $row->id_adr; ?>"><?php echo $row->prenom_adr.' '.$row->nom_adr.','.$row->adresse_adr.','.$row->codepostal_adr.','.$row->ville_adr.','.$row->pays_adr; ?></option>
										
									<?php
											}
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="float:left;" class="adr_div" >
							<?php
										foreach ($list_adr->result() as $row){
											if($row->TYPE == 'livraison'){
									?>
									<div id="<?php echo $row->id_adr.'liv';?>">
								
									 <b><?php echo $row->prenom_adr.' '.$row->nom_adr;?></b><br />
							   		 <?php echo $row->adresse_adr;?><br />
							   		 <?php echo $row->codepostal_adr.' '.$row->ville_adr.', '.$row->pays_adr;?><br />
							   		 Téléphone : <?php echo $row->tel_adr;?>
								
									</div>
								<?php
											}
										}
									?>
							</td>
						</tr>
					</table>
					
					
					<script type="text/javascript">

						$("#thechoices1").change(function(){
							$("#" + this.value+"liv").show().siblings().hide();
						});
						
						$("#thechoices1").change();
					
					</script>
					
					</div>
				
				</td>
				<td>
				<div id="gerer_compte" style="width:275px">
					<table>
						<tr>
							<td style="float:left;"><select id="thechoices2" name="adr_fct" style="width:263px;margin:5px;">
									<?php
										foreach ($list_adr->result() as $row){
											if($row->TYPE == 'facturation'){
									?>
									
										<option value="<?php echo $row->id_adr; ?>"><?php echo $row->prenom_adr.' '.$row->nom_adr.','.$row->adresse_adr.','.$row->codepostal_adr.','.$row->ville_adr.','.$row->pays_adr; ?></option>
										
									<?php
											}
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="float:left;" class="adr_div" >
								<?php
										foreach ($list_adr->result() as $row){
											if($row->TYPE == 'facturation'){
									?>
									<div id="<?php echo $row->id_adr.'fct';?>">
								
									 <b><?php echo $row->prenom_adr.' '.$row->nom_adr;?></b><br />
							   		 <?php echo $row->adresse_adr;?><br />
							   		 <?php echo $row->codepostal_adr.' '.$row->ville_adr.', '.$row->pays_adr;?><br />
							   		 Téléphone : <?php echo $row->tel_adr;?>
								
									</div>
								<?php
											}
										}
									?>
							</td>
						</tr>
					</table>
					
					
					
							<script type="text/javascript">

					$("#thechoices2").change(function(){
						$("#" + this.value+"fct").show().siblings().hide();
					});
					
					$("#thechoices2").change();
					
					</script>
				
				</div>
				
				</td>
			</tr>
			<tr>
				<td><a href="<?php echo base_url();?>commande/ajout_adr_liv_unique" style="color:#000000;margin-left:30px;">Choisir une autre adresse de livraison</a></td>
				<td><a href="<?php echo base_url();?>commande/ajout_adr_fct" style="color:#000000;margin-left:30px;">Choisir une autre adresse de facturation</a></td>
			</tr>
			
			<tr>
				<td  colspan="2" rowspan="1" align="center" style="padding-top:40px;">
					<a href="javascript:validation();"><img src="<?php echo base_url();?>img/valider.png" alt="logo" border="0" /></a>
				</td>
			</tr>
		</table>
	  	
	  
	  </div>
	  <!---->
	 
	  <!----> 
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </tbody>
</table>
<?php echo form_close();?>

</div>
