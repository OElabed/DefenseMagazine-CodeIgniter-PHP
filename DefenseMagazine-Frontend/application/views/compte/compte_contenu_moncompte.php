<div id="table_connexion" style="width:700px;">






<table border="0" cellpadding="2" cellspacing="2" style="width:704px;">
  
  <tbody>
    <tr class="entete_tb" >
      <td colspan="2" rowspan="1">Mon compte</td>
    </tr>
	
    <tr>
      <td  colspan="2" rowspan="1">
	  	<!--gerer mon compte-->
	  	<div id="gerer_compte">
			<table style="width: 100%;" border="0"
			 cellpadding="2" cellspacing="2">
			  <tbody>
			    <tr>
			      <td align="center">
				  
				  <div id="ico_gerer_compte">
				  		<table
						 cellpadding="2" cellspacing="2">
						  <tbody>
						    <tr>
						      <td><img src="<?php echo base_url(); ?>img/pictoGestionCommandes.png" alt="connect" border="0" /></td>
						      <td class="fonction_gerer"><a href="<?php echo base_url(); ?>compte/voir_compte_cmd">Suivre mes commandes</a></td>
						    </tr>
						  </tbody>
						</table>
	
				  </div>
				  
				  </td>
			      <td align="center">
				  
				  	<div id="ico_gerer_compte">
				  		<table 
						 cellpadding="2" cellspacing="2">
						  <tbody>
						    <tr>
						      <td><img src="<?php echo base_url(); ?>img/pictoGestionDonnees.png" alt="connect" border="0" /></td>
						      <td class="fonction_gerer" style="padding-left:15px;"><a href="<?php echo base_url(); ?>compte/voir_compte_pers">G&eacute;rer mes donn&eacute;es personnelles</a></td>
						    </tr>
						  </tbody>
						</table>
	
				  </div>
				  
				  </td>
			    </tr>
			    
			  </tbody>
			</table>

		
		</div>	
		<!---->  
	  </td>
    </tr>
	<tr>
      <td  colspan="2" rowspan="1">
	  <!---->
	  <div id="table_gerer_affiche">
	  		<h4>Mes derni&egrave;res commandes</h4>
						<div  class="table_tout_cmd">
						<table class="tab">
						<?php if ($list_nouv_cmd->num_rows()> 0 ){?>
						 	<tr>
						      <th class="inth" align="center">Num&egrave;ro</th>
						      <th class="inth" align="center">Date</th>
						      <th class="inth" align="left">Etat</th>
						      <th class="inth" align="right">Montant total TTC</th>
							 </tr>
						  <?php 
						  
						  $monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
						  foreach($list_nouv_cmd->result() as $row){
						  
						  ?> 
						    <tr>
						      <td class="int" align="center"><a href="<?php echo base_url(); ?>compte/details_cmd/<?php echo $row->id_cmd; ?>"><?php echo $row->id_cmd; ?></a></td>
						      <td class="int" align="center"><?php echo date("d/m/Y",strtotime($row->date_cmd)); ?></td>
						      <td class="int" align="left"><?php echo $row->statut_cmd; ?></td>
						      <td class="int" align="right"><?php echo  number_format($row->total_payer_cmd*$mult, 2); ?> <?php echo $mon_type;?></td>
						    </tr>
							<?php }
							}
							else{
							?>
							<tr>
						      <td class="int" align="left" colspan="4" rowspan="1" style="padding-left:10px;"> Aucune commande actuellement.</td>
						    </tr>
							<?php	
							}
							?>
							
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
