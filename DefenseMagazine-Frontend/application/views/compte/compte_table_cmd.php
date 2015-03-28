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
	  		<h4>Mes commandes</h4>
						<div  class="table_tout_cmd">
						<table class="tab">
						<?php if ($list_tt_cmd->num_rows()> 0 ){?>
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
							
							foreach($list_tt_cmd->result() as $row){
						  
						  ?> 
						    <tr>
						      <td class="int" align="center"><a href="<?php echo base_url(); ?>compte/details_cmd/<?php echo $row->id_cmd; ?>"><?php echo $row->id_cmd; ?></a></td>
						      <td class="int" align="center"><?php echo date("d/m/Y",strtotime($row->date_cmd)); ?></td>
						      <td class="int" align="left"><?php echo $row->statut_cmd; ?></td>
						      <td class="int" align="right"><?php echo  number_format($row->total_payer_cmd*$mult, 2); ?> <?php echo $mon_type;?></td>
						    </tr>
							<?php }
							}else{
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
