          <div id="top_vente">
            <h1>Liste des produit : <?php echo $fonction_titre ?> </h1>
            <img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
            <P>&nbsp;</P>
			
			<P>&nbsp;</P>
            <P id="top5"></P>
            
				<?php 
				
				$monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
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
                    <div id="prix"><?php echo number_format($row->prix_uni_produit*$mult, 2);?> <?php echo $mon_type;?></div>
                    
                    <div id="dispo">
                    <p style="color:#339933"></p>
                    </div>
                     <div id="a_panier">
                   	 <a href="#"><img src="<?php echo base_url();?>img/panier1.png" /></a> 
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