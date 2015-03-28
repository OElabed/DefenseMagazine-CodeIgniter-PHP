<?php 
foreach($categ_b_list as $row){ 
?>

<tr class="row0">
   <td class="sous_cat1"><a href="#"><strong><?php echo $row->nom_categorie ;?></strong></a>&nbsp;&nbsp;&nbsp;
   
   		<div class="action_categ">
						  <a href='<?php echo base_url().'categorie/Voir_categorie/'.$row->id_categorie.'s'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a>
							<a href='<?php echo base_url().'categorie/supprimer_categorie/'.$row->id_categorie.'s'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/trash_on.gif" alt="" title="Supprimer" /></a>
							<a href='<?php echo base_url().'categorie/editer_categorie/'.$row->id_categorie.'s'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/edit_small.gif" alt="" title="Editer" /></a>
							</div>
   
   </td>
</tr>

 	<?php
	 } ?>