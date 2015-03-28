		   <?php
					echo form_open('categorie/editer_categorie_submit/'.$categ_data['id_catego'].'s');
					
					$input_nom = array(
						              'name'        => 'nom',
						              'value'		=> $champ_nom,
						              'maxlength'   => '50',
						              'size'        => '30',
						            );
					
					
				?>
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Information</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td><table width="50" border="0">
							<tr>
                                 <td><div align="right"><strong> Cat&eacute;gorie parent</strong></div></td>
                                <td>
									<select name="catego_pere" style="width : 205px">
										<option value="<?php echo $categ_data['categ_parent_id'];?>" selected="selected"><?php echo $categ_data['categ_parent'];?> </option>
											<?php 
												foreach($categ_a_list as $row){
											?>
											<option value="<?php echo $row->id_categorie; ?>">
												<?php echo $row->nom_categorie; ?>
											</option>
											<?php }?>
									</select>					
								</td>
								
                              </tr>
								
							
                              <tr>
                                <td><div align="right"><strong>Nom du cat&eacute;gorie</strong></div></td>
                                <td>
									<?php echo form_input($input_nom); ?>	
									<p><font class="default"><?php echo form_error('nom');?></font></p>						
								</td>
								
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
									 <input type="submit" name="valider"  class="submit" value="valider" />
									</div>
								</td>
                                <td width="50%">
									<div align="left">
										<input name="reset" type="reset" class="reset" value="valider" />
									</div>
								</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
              </div>
              
             <?php echo form_close(); ?>