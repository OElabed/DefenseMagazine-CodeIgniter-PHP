          <div id="top_vente">
            <h1>Fiche de produit </h1>
            <img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
            <P>&nbsp;</P>
			<P>&nbsp;</P>
            <P id="top5"></P>
			
			
			
			<!---->
			
			<script type="text/javascript">
			$(document).ready(function() {
				
					//When page loads...
					$(".tab_content").hide(); //Hide all content
					$("ul.tabs li:first").addClass("active").show(); //Activate first tab
					$(".tab_content:first").show(); //Show first tab content
				
					//On Click Event
					$("ul.tabs li").click(function() {
				
						$("ul.tabs li").removeClass("active"); //Remove any "active" class
						$(this).addClass("active"); //Add "active" class to selected tab
						$(".tab_content").hide(); //Hide all tab content
				
						var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
						$(activeTab).fadeIn(); //Fade in the active ID content
						return false;
					});
				
				});
			</script>
			
			
			<!---->
			
			
            <?php 
			$monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
			?>
			
			<div id="fiche_prod">
			
			
			<table>
				<tr>
					<td class="affiche_image"><a href="<?php echo $img_path.$prod['url_image'];?>"><img src="<?php echo $img_path.$prod['url_image'];?>" alt="<?php echo $prod['url_image'];?>"/></a>
					</td>
					<td style="margin-top: 30px">
					
						<table style="margin-left:20px">
							<tr style="float:left;">
								<td>
									<div id="info_top">
					               	    <div class="titre_top">
					               	      <div align="left"><?php echo $prod['titre_produit'];?></div>
					               	    </div>
					                 	<div class="info_top">
											<p align="left">Editeur : <?php echo $prod['editeur_produit'];?></p>
					                        <p align="left">Catégorie : <?php echo $prod['nom_categorie'];?></p>
					                        <p align="left">Date de parution : <?php echo $prod['Date_parution_produit'];?></p>
											<p align="left">Nb. de pages : <?php echo $prod['nbre_page_produit'];?> pages</p>
											<br />
											<p align="left">Date d'ajout : <?php echo $prod['date_ajout_produit'];?></p>
									  	   
					                   </div>
					                 </div>
								
								
								</td>
							</tr>
							<tr>
								
								<td width="206" height="139">
								<div style="margin-top: -80px">
				               	  <div id="ajouter_au_panier">
				                    <div id="prix"><?php echo number_format($prod['prix_uni_produit']*$mult, 2);?> <?php echo $mon_type;?></div>
				                    
				                    <div id="dispo">
				                    <p style="color:#339933"></p>
				                    </div>
				                     <div id="a_panier">
									 <script language="JavaScript">
									 	
										function validation<?php echo $prod['id_produit'];?>(){
										document.forms[<?php echo '"pan_prod_'.$prod['id_produit'].'"' ?>].submit();
										}
										</script>
									 
									 <?php echo form_open('panier/add',array( 'name'=> 'pan_prod_'.$prod['id_produit'])); ?>
				                   	 <a href="javascript:validation<?php echo $prod['id_produit'];?>();"><img src="<?php echo base_url();?>img/panier1.png" /></a>
									 <?php echo form_hidden('id_prod',$prod['id_produit']);?>
									 <?php echo form_hidden('url_act',current_url());?>
									 <?php echo form_close();?>
									    
				                     </div>
				               	  </div>  
								  </div>               
				                  </td>
								
								
							</tr>
						</table>
					
					</td>
				</tr>
			</table>
			
			<!---->
			
				
			<div id="ajout_product_contenu">


				<ul class="tabs">
					    <li><a href="#tab1">Résumé </a></li>
					    <li><a href="#tab2">Caractéristique</a></li>
						<li><a href="#tab3">Sommaire</a></li>
				</ul>
				
				
				
				
				<div class="tab_container">
				<!--1********************-->
					<div id="tab1" class="tab_content">
							<!--contenan-->	
								<div style="height: 250px; overflow:auto;">
								<table id="contenu_tabs_prod">
									<tr>
										<td>
											<?php echo $prod['resum_produit'];?>
										</td>
									</tr>
								</table>			
								</div>
											
							<!--Content-->
					</div>
				<!--2********************-->
					<div id="tab2" class="tab_content">
											<!--Content-->
											<table id="contenu_tabs_prod">
												
															<tr>
																<td width="25%"><b>ISBN : </b></td>
																<td><?php echo $prod['ISBN_produit'];?></td>																
															</tr>
															<tr></tr>
															<tr>
																<td><b>Editeur : </b></td>
																<td><?php echo $prod['editeur_produit'];?></td>
																
															</tr>
															<tr></tr>
															<tr>
																<td><b>Date de parution : </b></td>
																<td><?php echo $prod['Date_parution_produit'];?></td>
																
															</tr>
															<tr></tr>
															<tr>
																<td><b>Nb. de pages : </b></td>
																<td><?php echo $prod['nbre_page_produit'];?> pages</td>
															</tr>
															<tr></tr>
															<tr>
																<td><b>Poids : </b></td>
																<td><?php echo $prod['poids_produit'];?> gr</td>
															</tr>
															<tr></tr>
															<tr>
																<td><b>Date d'ajout : </b></td>
																<td><?php echo $prod['date_ajout_produit_sans'];?></td>
															</tr>
														
											</table>	
							
										
									       <!--Content-->
									    </div>
				<!--3********************-->
					<div id="tab3" class="tab_content">
											<!--Content-->
												<div style="height: 250px; overflow:auto;">
												<table id="contenu_tabs_prod">
													<tr>
														<td>
															<?php echo $prod['sommaire_produit'];?>
														</td>
													</tr>
												</table>
												</div>
						
									       <!--Content-->
									    </div>
				
				<!--fin******************-->
				</div>
				
				</div>
			
			<!---->
			
			
			
			</div>
			
			
			
			
            
           
         </div>