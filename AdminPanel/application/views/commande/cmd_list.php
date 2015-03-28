<div id="cont_int">  
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th>Commande Id</th>
                            <th>Nom du Client</th>
                            <th>Total</th>
                            <th>Date d'ajout</th>
							<th>Status</th>
                            <th class="action">Action</th>

                          </tr>
                          </thead>
						  <?php 
						  		$this->load->model('client_model');
						  		$i = 1;
								foreach($cmd_list->result() as $row){
								$cli = $this->client_model->get_client($row->client_cmd);
							?>
                          <tr class="<?php if ($i%2) echo "row0 "; else echo "row1 ";?>">
                          	<td align="center"><?php echo $row->id_cmd ; ?></td>
                            <td>
							<table>
								<tr>
									<td><?php echo $cli['prenom_client'].' '.$cli['nom_client'];?></td>
									<td align="right"><a href='<?php echo base_url().'client/voir_client/'.$row->client_cmd; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a></td>
								</tr>
							</table>
							</td>
                            <td align="center"><?php echo $row->total_payer_cmd;?> <font size="1">TND</font></td>
                            <td align="center"><?php echo $row->date_cmd;?></td>
							<td align="center"><?php echo $row->statut_cmd; ?></td>
                            <td class="action">
							<a href='<?php echo base_url().'commande/commande_voir/'.$row->id_cmd; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a>
							<a href='<?php echo base_url().'commande/commande_supprimer/'.$row->id_cmd; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/trash_on.gif" alt="" title="Supprimer" /></a>
							<a href='<?php echo base_url().'commande/commande_edit/'.$row->id_cmd; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/edit_small.gif" alt="" title="Editer" /></a>
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