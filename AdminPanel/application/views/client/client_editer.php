<div id="Contenu">
      <!--3-1)url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>client">Clients</a> &gt; <b>Editer client</b></p>
      </div>
      <!--3-2)contenue essentielle -->
            <div id="Cont_ess">
            	<h2><?php echo $titre_interne ;?></h2>
                <img src="<?php echo base_url(); ?>img/ligne.png" />
              
           	     
              <div id="cont_int"> 
			   <?php
					echo form_open('client/editer_submit');
					echo form_hidden('id_client',$this->uri->segment(3));
					$input_nom = array(
						              'name'        => 'nom',
						              'value'		=> $client['nom_client'],
						              'maxlength'   => '50',
						              'size'        => '30',
						            );
					
					$input_prenom = array(
						              'name'        => 'prenom',
						              'value'		=> $client['prenom_client'],
						              'maxlength'   => '50',
						              'size'        => '30',
						            );
					
					$input_email = array(
						              'name'        => 'email',
						              'value'		=> $client['email_client'],
						              'maxlength'   => '100',
						              'size'        => '50',
						            );
									
					$input_tel = array(
						              'name'        => 'tel',
						              'value'		=> $client['tel_client'],
						              'maxlength'   => '20',
						              'size'        => '20',
						            );
									
				?>
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Information personnelle</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Civilité*</strong></div></td>
                                <td width="74%">
								<select name="civilite" style="width: 60px">
								<option value="Mr" <?php echo set_select('civilite', $client['civil_client'], TRUE); ?> ><?php echo $client['civil_client']?></option>
								<option value="Mr" <?php echo set_select('civilite', 'Mr'); ?> >Mr</option>
								<option value="Mme" <?php echo set_select('civilite', 'Mme'); ?> >Mme</option>
								<option value="Mlle" <?php echo set_select('civilite', 'Mlle'); ?> >Mlle</option>
								</select>
								
                                </td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Nom*</strong></div></td>
                                <td><?php echo form_input($input_nom); ?> <font class="default"><?php echo form_error('nom');?></font></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Prénom* </strong></div></td>
                                <td><?php echo form_input($input_prenom); ?> <font class="default"><?php echo form_error('prenom');?></font></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Email* </strong></div></td>
                                <td><?php echo form_input($input_email); ?> <font class="default"><?php echo form_error('email');?></font></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Num. Téléphone* </strong></div></td>
                                <td><?php echo form_input($input_tel); ?> <font class="default"><?php echo form_error('tel');?></font></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td style="color: #FF3300; font-style:italic;">* Champs obligatoires</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
			                
              
              <div style="margin-top:20px;">  
			  			  
              <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Abonnement à la newsletter</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
                              <tr>
                                <td width="26%">
								<?php echo $str_news;?>
								</td>
                                <td width="74%">
									
                                </td>
                              </tr>
							  
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
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

                   
              </div>   
            </div>
    </div>