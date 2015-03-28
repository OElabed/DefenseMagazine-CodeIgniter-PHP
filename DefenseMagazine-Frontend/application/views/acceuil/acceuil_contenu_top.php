          <div id="top_vente">
            <h1>Les meilleures ventes </h1>
            <img src="img/ligne.png" alt="ligne" />
            <P>&nbsp;</P>
            <P id="top5">Top 5 des meilleurs produit vendu</P>
            
			<?php 
			$i= 0;
			$monnaie = $this->session->userdata('monnaie');
			  $mult= $monnaie['mult_mon'];
			  $mon_type= $monnaie['nom_mon'];
			foreach($list_top_prod->result() as $row){ 
			$i++;
			?>
            <div id="top_model">
            <table>
              <tr>
                <td id="col1"><div id="num_top"><?php echo $i;?></div></td>
                <td id="col2"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$row->url_image;?>" alt="<?php echo $row->titre_produit;?>"/></a></td>
                <td id="col3">
               	  <div id="info_top">
               	    <div class="titre_top">
               	      <div align="left"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><?php echo $row->titre_produit;?></a></div>
               	    </div>
                 	<div class="info_top">
                        <p align="left">Nb. de vente : <?php echo $row->Nombre;?> </p>
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
                    <div id="prix"><?php echo  number_format($row->prix_uni_produit*$mult, 2) ;?> <?php echo $mon_type;?></div>
                    
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
            <P>&nbsp;</P>

         </div>