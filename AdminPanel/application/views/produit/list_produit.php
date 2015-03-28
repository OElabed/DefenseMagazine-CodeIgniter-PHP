<div id="add"><img src="<?php echo base_url();?>img/icon_plus.gif" /> <a href="<?php echo base_url(); ?>produit/ajout_produit">Ajouter Produit</a></div> 

                              <div id="cont_int">  
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th>Titre</th>
                            <th>Prix</th>
							<th>Quantit&eacute;</th>
                            <th>Statu</th>
                            <th>Date d'ajout</th>
                            <th class="action">Action</th>

                          </tr>
                          </thead>
						  <?php 
						  		$i = 1;
								foreach($prod_list->result() as $row){
							?>
                          <tr class="<?php if ($i%2) echo "row0 "; else echo "row1 ";?>">
                          	<td><?php echo $row->titre_produit ; ?></td>
                            <td align="right"><?php echo $row->prix_uni_produit; ?> DT</td>
                            <td align="center"><?php 
							if($row->quantite_produit == 0){
								echo '<font color="red"><b>'.$row->quantite_produit.'</b></font>';
							}else{
								echo $row->quantite_produit; 
							}
							
							
							?></td>
                            <td align="center">
								<?php 
								if($row->diponible == 1){
								?>
									<img src="<?php echo base_url(); ?>img/icons/disp.png" alt="" title="Voir" />
								<?php	
								}else{
								?>
									<img src="<?php echo base_url(); ?>img/icons/n_disp.png" alt="" title="Voir" />
								<?php	
								}
								?>
							</td>
							<td align="center"><?php echo $row->date_ajout_produit; ?></td>
                            <td class="action">
							<a href='<?php echo base_url().'produit/voir_produit/'.$row->id_produit; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a>
							<a href='<?php echo base_url().'produit/supprimer_produit/'.$row->id_produit; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/trash_on.gif" alt="" title="Supprimer" /></a>
							<a href='<?php echo base_url().'produit/edit_produit/'.$row->id_produit; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/edit_small.gif" alt="" title="Editer" /></a>
							</td>
                          </tr>
						  <?php 
						  	$i++;		
								}
    						?>
						  
                          
                  </table>
				  
              </div>
				<?php  echo $this->pagination->create_links();?>
                   
              </div>  