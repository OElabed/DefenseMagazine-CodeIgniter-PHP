 <div id="Contenu">
      <!--url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>categorie">Catégorie</a> &gt; <b>Tous catégorie</b></p>
      </div>
	  
            <div id="Cont_ess">
            	<h2>Table des catégories</h2>
                <img src="<?php echo base_url(); ?>img/ligne.png" />
              <div id="add"><img src="<?php echo base_url();?>img/icon_plus.gif" /> <a href="<?php echo base_url(); ?>categorie/ajouter_categorie">Ajouter Catégorie</a></div>
			  
			  
			  <script language="javascript"> 
				function toggle(showHideDiv, switchImgTag) {
				        var ele = document.getElementById(showHideDiv);
				        var imageEle = document.getElementById(switchImgTag);
				        if(ele.style.display == "block") {
				                ele.style.display = "none";
						imageEle.innerHTML = '<img src="<?php echo base_url(); ?>img/plus.png">';
				        }
				        else {
				                ele.style.display = "block";
				                imageEle.innerHTML = '<img src="<?php echo base_url(); ?>img/minus.png">';
				        }
				}
				</script>
			  
			  
			  <?php 
			  		$i=1;
					foreach($categ_a_list as $row){
				?>
              
              <div id="cont_int"> 
			  	  
                <div class="tablebox_autre">
                
                  <table>
                  			
                          
                     <tbody>
                        <tr class="row0">
                          <td>
						  <a id="imageDivLink<?php echo $i;?>" href="javascript:toggle('sous_cat_a<?php echo $i;?>', 'imageDivLink<?php echo $i;?>');"><img src="<?php echo base_url(); ?>img/minus.png" alt="plus" /></a>  <strong><?php echo $row->nom_categorie;?></strong>
						  
						  
						   <div class="action_categ">
						  <a href='<?php echo base_url().'categorie/Voir_categorie/'.$row->id_categorie.':p'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a>
							<a href='<?php echo base_url().'categorie/supprimer_categorie/'.$row->id_categorie.':p'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/trash_on.gif" alt="" title="Supprimer" /></a>
							<a href='<?php echo base_url().'categorie/editer_categorie/'.$row->id_categorie.':p'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/edit_small.gif" alt="" title="Editer" /></a>
							</div>
						  
						  <div id="sous_cat_a<?php echo $i;?>" style="display: block;" >
							<?php 
									foreach($categ_b_list[$row->id_categorie] as $row1){ 
									?>
									<table id="sous_cat">
									<tr class="row0">
									   <td class="sous_cat1"><strong><?php echo $row1->nom_categorie ;?></strong>&nbsp;&nbsp;&nbsp;
									   
									   		<div class="action_categ">
															  <a href='<?php echo base_url().'categorie/Voir_categorie/'.$row1->id_categorie.':s'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/contents.gif" alt="" title="Voir" /></a>
																<a href='<?php echo base_url().'categorie/supprimer_categorie/'.$row1->id_categorie.':s'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/trash_on.gif" alt="" title="Supprimer" /></a>
																<a href='<?php echo base_url().'categorie/editer_categorie/'.$row1->id_categorie.':s'; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/edit_small.gif" alt="" title="Editer" /></a>
																</div>
									   
									   </td>
									</tr>
									</table>
									 	<?php
										 } ?>
						  
				 		 </div>
						  
						  </td>
						  
                        </tr>
                        
                      </tbody>


  
                  </table>
				  
              </div>

                   
              </div>  
			  	
			  <?php 
			  $i++;
			  }?> 
              
               
            </div>

    </div>
				