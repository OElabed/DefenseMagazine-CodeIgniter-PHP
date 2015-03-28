          <div id="top_vente">
		  <script language="JavaScript">
									 	
										function validation_av(){
										document.forms["recherch_avance"].submit();
										}
										</script>
            <h1>Recherche : <?php echo $mot_ch ?></h1>
			<?php
				echo form_open('recherche/recherche_avance',array('name' =>'recherch_avance'));
			?>
			<div class="rech_av"><a href="javascript:validation_av();">Recherche Avancée</a></div>
            <img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
			<?php echo form_hidden('mot_ch',$mot_ch);?>
			<?php echo form_close(); ?>
            <P>&nbsp;</P>
			
			<P>&nbsp;</P>
            <P id="top5"></P>
            
				<?php 
				if($list_chercher->num_rows() != 0){
					
			$monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];	
			foreach($list_chercher->result() as $row){ 
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
			
			<?php } }
			else{
				?>
				
				<div id="panier_vide">
							<h3>Aucun Résultat</h3>
							</div>
				<?php
			}
			?>
            
            <P>&nbsp;</P>
			
            <P>&nbsp;</P>

         </div>