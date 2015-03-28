          <div id="top_vente">
            <h1>Toutes les nouveautés </h1>
            <img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
            <P>&nbsp;</P>
			
			<P>&nbsp;</P>
            <P id="top5"></P>
            
				<?php 
			foreach($prod_list->result() as $row){ 
			?>
            <div id="top_model">
            <table>
              <tr>
                <td id="col2"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$row->url_image;?>" alt="<?php echo $row->titre_produit;?>"/></a></td>
                <td id="col3">
               	  <div id="info_top">
               	    <div class="titre_top">
               	      <div align="left"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><?php echo $row->titre_produit;?></a></div>
               	    </div>
                 	<div class="info_top">
                        <p align="left">catégorie : <?php echo $row->nom_categorie;?></p>
                        <p align="left">Date de parution : <?php 
															   	$date = $row->Date_parution_produit;
																$date = explode('-',$date);				
																echo $date[2].'/'.$date[1].'/'.$date[0]; 
															   ?>
				  	   </p>
                   </div>
                  </div>		      </td>
                <td width="206" height="139">
               	  <div id="ajouter_au_panier">
                    <div id="prix"><?php echo $row->prix_uni_produit;?> DT</div>
                    
                    <div id="dispo">
                    <p style="color:#339933"></p>
                    </div>
                     <div id="a_panier">
                   	
						<script language="JavaScript">
									 	
										function validation<?php echo $row->id_produit;?>(){
										document.forms[<?php echo '"pan_prod_'.$row->id_produit.'"' ?>].submit();
										}
										</script>
									 
									 <?php echo form_open('panier/add',array( 'name'=> 'pan_prod_'.$row->id_produit)); ?>
				                   	 <a href="javascript:validation<?php echo $row->id_produit;?>();"><img src="<?php echo base_url();?>img/panier1.png" /></a>
									 <?php echo form_hidden('id_prod',$row->id_produit);?>
									 <?php echo form_hidden('url_act',current_url());?>
									 <?php echo form_close();?>
						
                     </div>
               	  </div>                 
                  </td>
              </tr>
            </table>
            </div>
			
			<?php } ?>
            
            <P>&nbsp;</P>
			<?php  echo $this->pagination->create_links();?>
            <P>&nbsp;</P>

         </div>