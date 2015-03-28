<div id="cont_int">             
              
              <?php echo form_open('payment/supprimer_trans'); ?>
			  <?php echo form_hidden('id_trans',$this->uri->segment(3));?>        
              <div style="margin-top:20px;">
              <div class="tablebox_autre">
                
                  <table cellpadding="50">
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
								
								<tr>
                                <td width="50%"><div align="right"><strong>Vous voulez vraiment supprimer la transaction  :</strong></div></td>
                                <td width="50%" class="info_ligne"><?php echo $this->uri->segment(3);?></td>
                              </tr>
                              <tr>
                                <td width="50%">
									<div align="right">
										<input type="submit" name="valider"  class="submit" value="valider" />
										<?php echo form_close(); ?> 
									</div>
								</td>
                                <td width="50%">
									<div align="left">
										<?php echo form_open('payment'); ?> 
											<input type="submit" name="valider"  class="retour" value="valider" />
										<?php echo form_close(); ?> 
									</div>
								</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
              </div>
              
    
              </div>  