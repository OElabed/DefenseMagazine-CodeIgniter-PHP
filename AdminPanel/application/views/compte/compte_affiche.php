<div id="cont_int"> 
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Informations du compte</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
                              
                              <tr>
                                <td width="10%"><div align="left"><strong>Email  </strong></div></td>
                                <td class="info_ligne"><?php echo $info['email']; ?></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Login  </strong></div></td>
                                <td class="info_ligne"><?php echo $info['login']; ?></td>
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
                                
                                <td align="center">
									<div align="center">
										<button name="button" class="editer" value="" onclick="self.location.href='<?php echo base_url(); ?>compte/compte_editer'"></button>
									</div>
								</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
              </div>
              

                   
              </div>   
      