<div id="cont_int"> 
                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Détails de la commande</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<!--commande num,date-->
							<table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Num. Commande : </strong></div></td>
                                <td width="74%"><?php echo $cmd_tr['id_cmd'];?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Date commandé : </strong></div></td>
                                <td><?php echo $cmd_tr['date_cmd'];?></td>
                              </tr>
                              
                            </table>
							</td>
                            
                          </tr>
						  
						  
						  <tr class="row0">
                          	
                            <td><table border="0">
                              <tr>
                                <td>
								<!--adresse -->
								<table style="margin-left:-8px;width :950px;">
										<tr>
											<td width="60" style="float:left;"><b>Client :</b></td>
											<td width="150" style="float:left;">
											<a href="<?php echo base_url().'client/voir_client/'.$cli_tr['id_client'];?>"><u><i><?php echo $cli_tr['prenom_client'].' '.$cli_tr['nom_client'];?></i></u></a><br />
											</td>
											<td width="150" style="float:left;margin-left:20px;"><b>Adresse Livraison :</b></td>
											<td width="150" style="float:left;">
											<?php echo $adr_liv['prenom_adr'];?> <?php echo $adr_liv['nom_adr'];?> <br />
											<?php echo $adr_liv['adresse_adr'];?><br />
											<?php echo $adr_liv['ville_adr'];?>, <?php echo $adr_liv['codepostal_adr'];?><br />
											<?php echo $adr_liv['ville_adr'];?>, <?php echo $adr_liv['pays_adr'];?>
											</td>
											<td width="165" style="float:left;margin-left:20px;"><b>Adresse Facturation :</b></td>
											<td width="150" style="float:left;">
											<?php echo $adr_fact['prenom_adr'];?> <?php echo $adr_fact['nom_adr'];?> <br />
											<?php echo $adr_fact['adresse_adr'];?><br />
											<?php echo $adr_fact['ville_adr'];?>, <?php echo $adr_fact['codepostal_adr'];?><br />
											<?php echo $adr_fact['ville_adr'];?>, <?php echo $adr_fact['pays_adr'];?>
											</td>
										</tr>
									</table>
								</td>
                              </tr>
							  </table>
							  <table>
                              <tr>
                                <td width="26%"><div align="left"><strong>Num. Téléphone : </strong></div></td>
                                <td width="74%"><?php echo $cli_tr['tel_client'];?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Adresse E-mail :  </strong></div></td>
                                <td><u><i><a href="mailto:<?php echo $cli_tr['email_client'];?>"><?php echo $cli_tr['email_client'];?></a></i></u></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Méthode de Payment :  </strong></div></td>
                                <td><?php echo $cmd_tr['method_pay_cmd'];?></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Méthode d'Expédition :  </strong></div></td>
                                <td><?php echo $cmd_tr['method_expedit_cmd'];?></td>
                              </tr>
                            </table></td>
                            
                          </tr>
						  
						  <tr class="row0">
                          	
                            <td>
							<!--produits-->
							<table border="0"  style="width:910px ">
                              <tr>
                                <td><b>Produits</b></td>
                                <td><b>Catégorie</b></td>
								<td><b>Prix(uni)</b></td>
                                <td align="right"><b>Total</b></td>
                              </tr>
							  <?php foreach($list_cmd_prod as $row){?>
							  <tr>
                                <td><?php echo $row->quantite_prod_vente;?> x <?php echo $row->titre_produit;?></td>
                                <td><?php echo $row->nom_categorie;?></td>
								<td><?php echo $row->prix_uni_produit;?> <font size="1">TND</font></td>
                                <td align="right"><?php echo number_format(($row->prix_uni_produit * $row->quantite_prod_vente), 2);;?> <font size="1">TND</font></td>
                              </tr>
							  <?php }?>
                            </table>
							
							<!--total-->
							<table style="width:910px ">
								<tr>
									<td width="800px" align="right"><b>Sous-Total : </b></td>
									<td align="right"><?php echo $cmd_tr['total_uni_cmd'];?> <font size="1">TND</font></td>
								</tr>
								<tr>
									<td align="right"><b>Frais de livraison  : </b></td>
									<td align="right"><?php echo $cmd_tr['frais_livraison_cmd'];?> <font size="1">TND</font></td>
								</tr>
								<tr>
									<td align="right"><b>Total  : </b></td>
									<td align="right"><b><?php echo $cmd_tr['total_payer_cmd'];?> <font size="1">TND</font></b></td>
								</tr>
							</table>
							</td>
                            
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
                                    	<button name="button" class="retour" value="" onclick="self.location.href='<?php echo base_url();?>commande'"></button>
									</div>
								</td>
                                <td width="50%">
									<div align="left"> 
											<button name="button" class="editer" value="" onclick="self.location.href='<?php echo base_url(); ?>commande/commande_edit/<?php echo $this->uri->segment(3);?>'"></button>
									</div>
								</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
              </div>
</div>
