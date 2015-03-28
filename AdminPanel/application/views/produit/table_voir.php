<div id="cont_int">

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


<div id="ajout_product_contenu">


<ul class="tabs">
	    <li><a href="#tab1">Description</a></li>
	    <li><a href="#tab2">Détails</a></li>
		<li><a href="#tab3">Image</a></li>
		<li><a href="#tab4">Catégorie</a></li>
		<li><a href="#tab5">Quantités</a></li>
		<li><a href="#tab6">Prix</a></li>
</ul>



<div class="tab_container">
<!--1********************-->
	<div id="tab1" class="tab_content">
			<!--contenan-->	
							

                <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Détails de produit</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<div style="height: 360px; overflow:auto;">
							<table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Titre</strong></div></td>
                                <td width="74%" class="info_ligne"><?php echo $produit_tr['titre_produit'];?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Resumé </strong></div></td>
                                <td><?php echo $produit_tr['resum_produit'];?></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Sommaire </strong></div></td>
                                <td><?php echo $produit_tr['sommaire_produit'];?></td>
                              </tr>
                            </table>
							</div>
							</td>
                            
                          </tr>
                          
                  </table>
              </div>
							
					        <!--Content-->
	</div>
<!--2********************-->
	<div id="tab2" class="tab_content">
							<!--Content-->
								
								<div class="tablebox_autre">
                
               		  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Description de produit</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<div style="height: 350px; overflow:auto;">
							<table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Editeur</strong></div></td>
                                <td width="74%" class="info_ligne">
								 <?php echo $produit_tr['editeur_produit'];?> 
								</td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>ISBN</strong></div></td>
                                <td class="info_ligne"><?php echo $produit_tr['ISBN_produit'];?> </td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Date de parution </strong></div></td>
                                <td class="info_ligne"><?php echo $produit_tr['Date_parution_produit'];?> </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Nombre de pages</strong></div></td>
                                <td class="info_ligne"><?php echo $produit_tr['nbre_page_produit'];?> </td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Poids </strong></div></td>
                                <td class="info_ligne"><?php echo $produit_tr['poids_produit'];?> <b>gr</b> </td>
                              </tr>
                            </table>
							</div>
							</td>
                            
                          </tr>
                          
                  </table>
              </div>
								
					       <!--Content-->
					    </div>
<!--3********************-->
	<div id="tab3" class="tab_content">
							<!--Content-->								
								
								
								<div class="tablebox_autre">
                
               		  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Image de produit</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<div style="height: 360px; overflow:auto;">
							<table width="200" border="0">
							  
							  <tr>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Lien de l'image</strong></div></td>
                                <td class="info_ligne">
								 <?php echo realpath(APPPATH . '../image_produit/thumb/'.$img_prod);?> 
								</td>
                              </tr>
                              
                              <tr>
							  	<td></td>
                                <td>
									<div class="image_upload_affiche">
										<a href="<?php echo base_url().'image_produit/thumb/'.$img_prod;?>"><img src="<?php echo base_url().'image_produit/thumb/'.$img_prod ;?>" alt="prod1" height="203px" width="153px" /></a>
									</div>
								</td>
                              </tr>
                            </table>
							</div>
							</td>
                            
                          </tr>
                          
                  </table>
              </div>
								
					       <!--Content-->
					    </div>
<!--4********************-->
	<div id="tab4" class="tab_content">
							<!--Content-->
							<div class="tablebox_autre">
							
							
														
							
							
               		  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Catégorie de produit</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<div style="height: 350px; overflow:auto;">
							<table width="200" border="0">
							<tr>
                                <td width="26%"><div align="left"><strong>Catégorie</strong></div></td>
                                <td width="74%" class="info_ligne"><?php echo $categ['categ_parent'];?></td>
                              </tr>
								
                              <tr>
                                <td><div align="left"><strong>Sous-catégorie</strong></div></td>
                                <td class="info_ligne"><?php echo $categ['nom_catego'];?></td>
                              </tr>                             
                              
                            </table>
							</div>
							</td>
                            
                          </tr>
                          
                  </table>
              </div>
								
					       <!--Content-->
					    </div>
<!--5********************-->
	<div id="tab5" class="tab_content">
							<!--Content-->
								
								<div class="tablebox_autre">
                
               		  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Quantités de produit</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<div style="height: 350px; overflow:auto;">
							<table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Nombres de produit dans le stock </strong></div></td>
                                <td width="74%" class="info_ligne"><?php echo $produit_tr['quantite_produit'];?></td>
                              </tr>
							  <tr>
                                <td></td>
                                <td></td>
                              </tr>&nbsp;
							  <tr>
                                <td><div align="left"><strong>Etat du stock </strong></div></td>
                                <td class="info_ligne"> 
								<?php 
									if($produit_tr['diponible'] == 1){
										echo 'Disponible à vendre';
									}else{
										echo 'Non disponible à vendre';
									}
								?>
								</td>
                              </tr>
                              
                            </table>
							</div>
							</td>
                            
                          </tr>
                          
                  </table>
              </div>
								
					       <!--Content-->
					    </div>
<!--6********************-->
	<div id="tab6" class="tab_content">
							<!--Content-->
								
								<div class="tablebox_autre">
                
               		  <table>
                  			<thead>
                          <tr>

                            <th><div align="left" class="style1">Prix de produit</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<div style="height: 350px; overflow:auto;">
							<table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Prix unitaire </strong></div></td>
                                <td width="74%" class="info_ligne"><?php echo $produit_tr['prix_uni_produit'];?> DT</td>
                              </tr>
							  
                            </table>
							</div>
							</td>
                            
                          </tr>
                          
                  </table>
              </div>
								
					       <!--Content-->
					    </div>
<!--fin******************-->
</div>

</div>


<div style="margin-top:-120px;margin-left:20px;">
		              <div class="tablebox_autre">
		                
		                  <table cellpadding="50">
		                          <tr class="row0">
		                          	
		                            <td><table width="200" border="0">
                              <tr>
                                <td width="50%">
									<div align="right">
                                    	<button name="button" class="retour" value="" onclick="self.location.href='<?php echo base_url(); ?>produit'"></button>
									</div>
								</td>
                                <td width="50%">
									<div align="left">
										<button name="button" class="editer" value="" onclick="self.location.href='<?php echo base_url(); ?>produit/edit_produit/<?php echo $this->uri->segment(3);?>'"></button>
									</div>
								</td>
                              </tr>
                            </table></td>
		                            
		                          </tr>
		                          
		                  </table>
		              </div>
		        </div>
				

</div>
