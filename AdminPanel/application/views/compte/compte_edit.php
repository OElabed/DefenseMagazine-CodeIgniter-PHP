<div id="cont_int"> 
<?php
					echo form_open('compte/compte_editer');
					
					$input_email = array(
						              'name'        => 'email',
						              'value'		=>  $info['email'],
						              'maxlength'   => '100',
						              'size'        => '50',
						            );
					$input_login = array(
						              'name'        => 'login',
						              'value'		=> $info['login'],
						              'maxlength'   => '100',
						              'size'        => '30',
						            );	
									
					$input_password = array(
						              'name'        => 'password',
									  'type'		=> 'password',
						              'value'       => '',
						              'maxlength'   => '300',
						              'size'        => '25',
						            );
									
					$input_password_vf = array(
						              'name'        => 'password_vf',
									  'type'		=> 'password',
						              'value'       => '',
						              'maxlength'   => '300',
						              'size'        => '25',
						            );			
									
				?>





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
                                <td width="30%"><div align="left"><strong>Email*  </strong></div></td>
                                <td class="info_ligne"><?php echo form_input($input_email); ?> <font class="default"><?php echo form_error('email');?></font></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Login*  </strong></div></td>
                                <td class="info_ligne"><?php echo form_input($input_login); ?> <font class="default"><?php echo form_error('login');?></font></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Mot de passe*  </strong></div></td>
                                <td class="info_ligne"><?php echo form_input($input_password); ?> <font class="default"><?php echo form_error('password');?></font></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Confirmation du mot de passe*  </strong></div></td>
                                <td class="info_ligne"><?php echo form_input($input_password_vf); ?> <font class="default"><?php echo form_error('password_vf');?></font></td>
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
              

                <?php echo form_close();?>   
              </div>   
      