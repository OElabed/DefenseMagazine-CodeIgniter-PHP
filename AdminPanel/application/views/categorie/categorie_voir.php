<div id="Contenu">
      <!--3-1)url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>categorie">Catégorie</a> &gt; <b>Voir catégorie</b></p>
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

                            <th><div align="left" class="style1">Information</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Nom : </strong></div></td>
                                <td width="74%" class="info_ligne"><?php echo $categ_data['nom_catego']; ?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Type : </strong></div></td>
                                <td class="info_ligne"><?php echo $categ_data['type_categ']; ?></td>
                              </tr>
							  
							  <?php 
							  	$char_url = $this->uri->segment(3);
								if ($char_url{1} == 's'){					
							  ?>
							  <tr>
                                <td><div align="left"><strong>Categorie Parent : </strong></div></td>
                                <td class="info_ligne"><?php echo $categ_data['categ_parent']; ?></td>
                              </tr>
							  <?php }?>
                              
							  <tr>
                                <td><div align="left"><strong>Date d'ajout :  </strong></div></td>
                                <td class="info_ligne"><?php echo $categ_data['date_ajout']; ?></td>
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
                                    	<button name="button" class="retour" value="" onclick="self.location.href='<?php echo base_url(); ?>categorie'"></button>
									</div>
								</td>
                                <td width="50%">
									<div align="left">
										<button name="button" class="editer" value="" onclick="self.location.href='<?php echo base_url().'categorie/editer_categorie/'.$char_url; ?>'"></button>
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