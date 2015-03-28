<div id="Contenu">
      <!--3-1)url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>client">Clients</a> &gt; <b>Ajouter client</b></p>
      </div>
      <!--3-2)contenue essentielle -->
            <div id="Cont_ess">
            	<h2><?php echo $titre_interne ;?></h2>
                <img src="<?php echo base_url(); ?>img/ligne.png" />
              
           	     
              <div id="cont_int"> 
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
                                <td width="26%"><div align="left"><strong>Civilité : </strong></div></td>
                                <td width="74%" class="info_ligne"><?php echo $client['civil_client']; ?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Nom : </strong></div></td>
                                <td class="info_ligne"><?php echo $client['nom_client']; ?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Prénom :  </strong></div></td>
                                <td class="info_ligne"><?php echo $client['prenom_client']; ?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Email :  </strong></div></td>
                                <td class="info_ligne"><?php echo $client['email_client']; ?></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Téléphone :  </strong></div></td>
                                <td class="info_ligne"><?php echo $client['tel_client']; ?></td>
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
                                  <?php echo $str_catego; ?>
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
                                    	<button name="button" class="retour" value="" onclick="self.location.href='<?php echo base_url(); ?>client'"></button>
									</div>
								</td>
                                <td width="50%">
									<div align="left">
										<button name="button" class="editer" value="" onclick="self.location.href='<?php echo base_url(); ?>client/editer_client/<?php echo $this->uri->segment(3);?>'"></button>
									</div>
								</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
              </div>
              

                   
              </div>   
            </div>
    </div>