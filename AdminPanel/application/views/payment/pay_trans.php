<div id="cont_int">  
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th>Transaction Id</th>
                            <th>Commande ID</th>
                            <th>Total</th>
                            <th>Date</th>
							<th>Type paiement</th>
                            <th class="action">Action</th>

                          </tr>
                          </thead>
						  <?php 
						  		$this->load->model('client_model');
						  		$i = 1;
								foreach($trans_list->result() as $row){
								$pay_meth = $this->Payment_model->get_meth_pay($row->method_payment_trans);
							?>
                          <tr class="<?php if ($i%2) echo "row0 "; else echo "row1 ";?>">
                          	<td align="center"><?php echo $row->id_trans ; ?></td>
                            <td>
							<table>
								<tr>
									<td><?php echo $row->cmd_trans;?></td>
									<td align="right"><a href='<?php echo base_url().'commande/commande_voir/'.$row->cmd_trans; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a></td>
								</tr>
							</table>
							</td>
                            <td align="right"><?php echo $row->frais_trans;?> <font size="1">TND</font></td>
                            <td align="center"><?php echo $row->date_trans;?></td>
							<td align="center"><?php echo $pay_meth; ?></td>
                            <td class="action">
							<a href='<?php echo base_url().'payment/voir_trans/'.$row->id_trans; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a>
							<a href='<?php echo base_url().'payment/supprimer_trans/'.$row->id_trans; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/trash_on.gif" alt="" title="Supprimer" /></a>
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