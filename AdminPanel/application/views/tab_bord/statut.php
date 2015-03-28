 <div id="cont_int">  
              <h3>Etat de commandes</h3>
                <div class="tablebox_tabbord">
                
                  <table>
                          <tr class="row0">
                            <td><a href="<?php echo base_url(); ?>commande/list_commande_livred">Commandes livrés</a></td>
                            <td id="nbre"><?php echo $nb_cmd_liv; ?></td>
                          </tr>
                          <tr class="row1">
                            <td><a href="<?php echo base_url(); ?>commande/list_commande_wait">Commandes en attentes</a> </td>
                            <td id="nbre"><?php echo $nb_cmd_att; ?></td>                           
                          </tr>
                          <tr class="row0">
                            <td><a href="<?php echo base_url(); ?>commande/list_commande_Cancelled">Commandes annulés</a></td>
                            <td id="nbre"><?php echo $nb_cmd_anl; ?></td>                           
                          </tr>
                  </table>
              </div>

                  <p>&nbsp;</p>
                  <h3>Transactions</h3>
                
            <div class="tablebox_tabbord">
                  <table>
                          <tr class="row0">
                            <td><a href="<?php echo base_url(); ?>Payment/transaction_conf">Transactions des commandes confirmées</a></td>
                            <td id="nbre">2</td>
                          </tr>
                          <tr class="row1">
                            <td><a href="<?php echo base_url(); ?>Payment/transaction_att">Transactions des commandes en attentes</a> </td>
                            <td id="nbre">2</td>                           
                          </tr>
						  <tr class="row0">
                            <td><a href="<?php echo base_url(); ?>Payment/transaction_ann">Transactions des commandes annulées</a> </td>
                            <td id="nbre">2</td>                           
                          </tr>

                  </table>
                  
              </div>
                  <p>&nbsp;</p>
                  <h3>Produits</h3>
               
            <div class="tablebox_tabbord">
                  <table>
                          <tr class="row0">
                            <td><a href="<?php echo base_url(); ?>produit">Nombres de produits</a></td>
                            <td id="nbre"><?php echo $nb_prod; ?></td>
                          </tr>

                  </table>
                  
              </div>
                
                  <p>&nbsp;</p>
                  <h3>Clients</h3>
               
            <div class="tablebox_tabbord">
                  <table>
                          <tr class="row0">
                            <td><a href="<?php echo base_url(); ?>client">Nombres de clients</a></td>
                            <td id="nbre"><?php echo $nb_cli; ?></td>
                          </tr>

                  </table>
                  
                </div>


                
              </div>   