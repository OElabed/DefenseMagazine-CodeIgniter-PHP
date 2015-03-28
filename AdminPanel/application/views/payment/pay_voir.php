<div id="cont_int"> 
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Détails de la commande</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<!--commande num,date-->
							<table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Num. Transaction : </strong></div></td>
                                <td width="74%"><?php echo $this->uri->segment(3);?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Num. Commande : </strong></div></td>
                                <td><?php echo $trans['cmd_trans'];?></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Date : </strong></div></td>
                                <td><?php echo $trans['date_trans'];?></td>
                              </tr>
                              
                            </table>
							</td>
                            
                          </tr>
						  
						  
						  <tr class="row0">
                          	
                            <td>
							  <table>
                              <tr>
                                <td width="26%"><div align="left"><strong>Num. Autorisation : </strong></div></td>
                                <td width="74%"><?php echo $trans['num_autorisation'];?></td>
                              </tr>
							  <tr>
                                <td width="26%"><div align="left"><strong>Total payé  : </strong></div></td>
                                <td width="74%"><?php echo $trans['frais_trans'];?></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Client :  </strong></div></td>
                                <td><a href="<?php echo base_url().'client/voir_client/'.$cli['id_client'];?>"><u><i><?php echo $cli['prenom_client'].' '.$cli['nom_client'];?></i></u></a></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Méthode de Payment :  </strong></div></td>
                                <td><?php echo $this->Payment_model->get_meth_pay($trans['method_payment_trans']);?></td>
                              </tr>
                            </table></td>
                            
                          </tr>					  
                          
                  </table>
              </div>
			  
              
            
			  
			  <div style="margin-top:20px;">
              <div class="tablebox_autre">
                
                  <table cellpadding="50">
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
                              <tr>
                                <td width="50%">
									<div align="right">
                                    	<button name="button" class="retour" value="" onclick="self.location.href='<?php echo base_url();?>payment'"></button>
									</div>
								</td>
                                <td width="50%">
								</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
              </div>
</div>
