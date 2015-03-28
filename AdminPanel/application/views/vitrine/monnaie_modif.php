<div id="cont_int">             
              
              <?php echo form_open('Vitrine/modif_monnaie'); ?> 
			  <?php echo form_hidden('id_mon',$this->uri->segment(3));?>       
              <div style="margin-top:20px;">
              <div class="tablebox_autre">
                
                  <table cellpadding="50">
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
								
								<tr>
                                <td width="50%"><div align="right"><strong>Taux de change: 1 TND = </strong></div></td>
                                <td width="50%" class="info_ligne"><input type="text" name="mult" style="width:100px;" value="<?php echo $drap_details['mult_mon']?>"/>&nbsp;&nbsp;<?php echo $drap_details['nom_mon'];?><font class="default"><?php echo form_error('mult');?></font></td>
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
										<?php echo form_open('Vitrine'); ?> 
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
            