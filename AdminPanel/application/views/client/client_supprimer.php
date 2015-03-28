<div id="Contenu">
      <!--3-1)url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>client">Clients</a> &gt; <b>Supprimer Client</b></p>
      </div>
      <!--3-2)contenue essentielle -->
            <div id="Cont_ess">
            	<h2><?php echo $titre_interne ;?></h2>
                <img src="<?php echo base_url(); ?>img/ligne.png" />
              
           	     
              <div id="cont_int">             
              
              <?php echo form_open('client/supprimer_client'); ?> 
			  <?php echo form_hidden('id_client',$this->uri->segment(3));?>       
              <div style="margin-top:20px;">
              <div class="tablebox_autre">
                
                  <table cellpadding="50">
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
								
								<tr>
                                <td width="50%"><div align="right"><strong>Vous voulez vraiment supprimer le client :</strong></div></td>
                                <td width="50%" class="info_ligne"><?php echo $client_sp['nom_client'].' '.$client_sp['prenom_client'];?></td>
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
										<?php echo form_open('client'); ?> 
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
            </div>
    </div>