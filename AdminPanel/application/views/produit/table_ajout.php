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
	    <li><a href="#tab1">Description </a></li>
	    <li><a href="#tab2">Détails</a></li>
		<li><a href="#tab3">Image</a></li>
		<li><a href="#tab4">Catégorie</a></li>
		<li><a href="#tab5">Quantités</a></li>
		<li><a href="#tab6">Prix</a></li>
</ul>

<?php echo form_open_multipart('produit/ajout_produit', array('name'=>'myform'));?>
<?php
							
							
							$input_titre = array(
								              'name'        => 'titre',
								              'value'		=> set_value('titre'),
								              'maxlength'   => '50',
								              'size'        => '30',
								            );
							
							$input_editeur = array(
								              'name'        => 'editeur',
								              'value'		=> set_value('editeur'),
								              'maxlength'   => '50',
								              'size'        => '30',
								            );
							
							$input_ISBN = array(
								              'name'        => 'ISBN',
								              'value'		=> set_value('ISBN'),
								              'maxlength'   => '50',
								              'size'        => '30',
								            );
											
							$input_date_paru = array(
								              'name'        => 'date_paru',
								              'value'       => set_value('date_paru'),
											  'id'			=>'datepicker',  
								              'maxlength'   => '50',
								              'size'        => '30',
								            );
											
							$input_nbpage = array(
								              'name'        => 'nb_page',
								              'value'		=> set_value('nb_page'),
								              'maxlength'   => '20',
								              'size'        => '20'
								            );
							$input_poids= array(
								              'name'        => 'poids',
								              'value'		=> set_value('poids'),
								              'maxlength'   => '20',
								              'size'        => '20'
								            );
							$input_image= array(
								              'name'        => 'image',
								              'value'		=> set_value('image'),
											  'size'        => '70'
								            );
											
							$input_quantite= array(
								              'name'        => 'quantite',
								              'value'		=> set_value('quantite'),
								              'maxlength'   => '20',
								              'size'        => '20'
								            );
											
							$input_prix= array(
								              'name'        => 'prix',
								              'value'		=> set_value('prix'),
								              'maxlength'   => '20',
								              'size'        => '20'
								            );
											
						?>
						<?php include_once("date_edit.php");?>


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
                                <td width="26%"><div align="left"><strong>Titre*</strong></div></td>
                                <td width="74%">
								<?php echo form_input($input_titre); ?> <font class="default"><?php echo form_error('titre');?></font>
								</td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Resumé* </strong></div></td>
                                <td><textarea name="resum" rows=3 COLS=50><?php set_value('resum');?></textarea> <font class="default"><?php echo form_error('adresse');?></font></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Sommaire* </strong></div></td>
                                <td><?php include_once("editeur_text.php");?> <font class="default"><?php echo form_error('sommaire');?></font></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td style="color: #FF3300; font-style:italic;">* Champs obligatoires</td>
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
                                <td width="26%"><div align="left"><strong>Editeur*</strong></div></td>
                                <td width="74%">
								 <?php echo form_input($input_editeur);?> <font class="default"><?php echo form_error('editeur');?></font>
								</td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>ISBN*</strong></div></td>
                                <td><?php echo form_input($input_ISBN);?> <font class="default"><?php echo form_error('ISBN');?></font></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Date de parution* </strong></div></td>
                                <td><?php echo form_input($input_date_paru); ?> <font class="default"><?php echo form_error('date_paru');?></font></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Nombre de pages</strong></div></td>
                                <td><?php echo form_input($input_nbpage);?> <font class="default"><?php echo form_error('nb_page');?></font></td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Poids* </strong></div></td>
                                <td><?php echo form_input($input_poids);?> <b>gr</b> <font class="default"><?php echo form_error('poids');?></font></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td style="color: #FF3300; font-style:italic;">* Champs obligatoires</td>
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
                                <td width="26%"><div align="left"><strong>Lien URL de base d'image</strong></div></td>
                                <td width="74%">
								 <?php echo base_url().'image_produit/'; ?>
								</td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Lien Path de base l'image</strong></div></td>
                                <td>
								 <?php echo'C:/wamp/www/monprojet/image_produit/'; ?> 
								</td>
                              </tr>
							  <tr>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td><div align="left"><strong>Lien de l'image*</strong></div></td>
                                <td>
								 <?php echo form_upload($input_image);?> <br><font class="default"><?php echo $ch3;?></font>
								</td>
                              </tr>
							  <tr>
                                <td></td>
                                <td style="color: #FF3300; font-style:italic;">* Champs obligatoires</td>
                              </tr>
                              
                              
                              <tr>
							  	<td></td>
                                <td>
									<div id="image_upload_affiche" style="height: 204px;width: 154px;padding: 2px;border: 1px solid #999;">
										<img src="<?php echo base_url();?>image_produit/default.png" alt="prod1" height="200px" width="150px" />
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
                                <td width="26%"><div align="left"><strong>Catégorie*</strong></div></td>
                                <td width="74%"><font class="default"><?php echo $ch4 ;?></font></td>
                              </tr>
								
                              <tr>
                                <td></td>
                                <td>
								 	<?php 
												
												foreach($catego_a_list as $row){
												echo '<table>';
												echo '<tr><td width="20%"><input type="radio" name ="categ_a" value="'.$row->nom_categorie.'" ><b> '.$row->nom_categorie.'</b></td>';
												
												echo '<td><select name="'.$row->nom_categorie.'" style="width : 200px">';
												echo '<option value=" " selected="selected"> </option>';
													foreach($catego_b_list as $row1){
														if ($row1->categorie_pere == $row->id_categorie){
														echo '<option value="'.$row1->id_categorie.'">'.$row1->nom_categorie.'</option>';
														}
												     }
												echo '</select></td></tr>';
												echo '</table>';
											    }?>
											
											
										
								</td>
                              </tr>
							  
							  <tr>
                                <td></td>
                                <td style="color: #FF3300; font-style:italic;">* Champs obligatoires</td>
                              </tr>
                              
                              
                              <tr>
                                <td></td>
                                <td></td>
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
                                <td width="26%"><div align="left"><strong>Nombres de produit dans le stock*</strong></div></td>
                                <td width="74%">
								 <?php echo form_input($input_quantite);?> <font class="default"><?php echo form_error('quantite');?></font>
								</td>
                              </tr>
							  <tr>
                                <td></td>
                                <td></td>
                              </tr>&nbsp;
							  <tr>
                                <td><div align="left"><strong>Etat du stock*</strong></div></td>
                                <td>
								 <input type="radio" name ="etat" value="vendre" ><b> à vendre</b>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name ="etat" value="non_vendre" checked="checked"><b> n'est pas à vendre</b>

								</td>
                              </tr>
							   <tr>
                                <td></td>
                                <td><font class="default"><?php echo $ch5;?></font></td>
                              </tr>
							  <tr>
                                <td></td>
                                <td style="color: #FF3300; font-style:italic;">* Champs obligatoires</td>
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
                                <td width="26%"><div align="left"><strong>Prix unitaire*</strong></div></td>
                                <td width="74%">
								 <?php echo form_input($input_prix);?> <b>DT</b> <font class="default"><?php echo form_error('prix');?></font>
								</td>
                              </tr>
							  <tr>
                                <td></td>
                                <td></td>
                              </tr>
							  
							  
							  
							  <tr>
                                <td></td>
                                <td style="color: #FF3300; font-style:italic;">* Champs obligatoires</td>
                              </tr>
                              
                              
                              <tr>
                                <td></td>
                                <td></td>
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