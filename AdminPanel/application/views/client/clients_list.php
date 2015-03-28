<div id="Contenu">
      <!--url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>client">Clients</a> &gt; <b>List des clients</b></p>
      </div>
      <!--contenue essentielle -->
            <div id="Cont_ess">
            	<h2><?php echo $titre_interne ;?></h2>
                <img src="<?php echo base_url(); ?>img/ligne.png" />
              
              	 <div id="add"><img src="<?php echo base_url();?>img/icon_plus.gif" /> <a href="<?php echo base_url(); ?>client/ajouter_client">Ajouter Client</a></div> 
               <div id="cont_int">  
                <div class="tablebox_autre">
                
                  <table>
                  		<thead>
                          <tr>

                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Date d'inscrit</th>
                            <th class="action">Action</th>

                          </tr>
                          </thead>
						  <?php 
						  		$i = 1;
								foreach($clts_list->result() as $row){
							?>
                          <tr class="<?php if ($i%2) echo "row0 "; else echo "row1 ";?>">
                          	
                            <td><?php echo $row->nom_client; ?></td>
                            <td><?php echo $row->prenom_client; ?></td>
                            <td align="center"><?php echo $row->email_client; ?></td>
                            <td align="center"><?php echo $row->date_ajout_client; ?></td>
                            <td class="action">
							<a href='<?php echo base_url().'client/voir_client/'.$row->id_client; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a>
							<a href='<?php echo base_url().'client/supprimer_client/'.$row->id_client; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/trash_on.gif" alt="" title="Supprimer" /></a>
							<a href='<?php echo base_url().'client/editer_client/'.$row->id_client; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/edit_small.gif" alt="" title="Editer" /></a>
							</td>
                          </tr>
						  <?php 
						  	$i++;		
								}
    						?>
						  
                          
                  </table>
              </div>
				<?php  echo $this->pagination->create_links();?>
                   
              </div>   
            </div>
    </div>








