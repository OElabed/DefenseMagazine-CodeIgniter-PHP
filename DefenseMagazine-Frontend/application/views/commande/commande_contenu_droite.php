<div id="right_contenant">
          
          <div id="avantage">
            <div id="box">
              <div id="titre_box">
                <p><strong>Contactez-nous</strong></p>
              </div>
              <div id="sub_box">
                <div id="contacte_nous">
                  <strong>N° Téléphone</strong> :71 560 244<br />
                  <strong>Fax</strong> :71 561 804<br />
                  <strong>Adresse</strong> :Bab mnara 1008 La kasba - Tunis<br />
                <strong>E-mail :</strong><a href="mailto:defense.magazine@gmail.com">defense.magazine@<br/>gmail.com</a></div> 
                </div>
            </div>
          </div>
          <p>&nbsp;</p>
          
        <div id="Dernier achat">
          <div id="box">
            <div id="titre_box">
              <p><strong>Derniers achats</strong></p>
              </div>
   	             <div id="sub_box">
				 
				 <?php 
				 $monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
				 
				 foreach($list_der_achat->result() as $row) {?>
				 
   	               <div id="dernier_vente_box">
    	               
   	                 <div id="prod_ventedernier_tof"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$row->url_image;?>" alt="<?php echo $row->titre_produit;?>"  /></a></div>
                  
              	   <div id="prod_vente_info">
              	     <div id="prod_vente_date">
              	       <p class="date_prod_vendu">
					   <?php echo date("m.d.Y", strtotime($row->date_vente)); ?>
					  </p>
                   </div>
                   <p class="Titre_vendu"><?php echo $row->titre_produit;?></p>
                   <p class="date_sortie">D. sortie: <?php 
				   	$date = $row->Date_parution_produit;
					$date = explode('-',$date);				
					echo $date[2].'/'.$date[1].'/'.$date[0]; 
				   ?><br/> Catégorie: <?php echo $row->nom_categorie;?></p>
                   </div>
                   <div id="commerce_info">
                     <p><strong>Prix : <br/><?php echo number_format($row->prix_uni_produit*$mult, 2);?><?php echo $mon_type;?></strong>	<br/><br/>
                       <a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"> Détails...</a></p>
                  </div>
              </div>
			  
			  <?php } ?>
			  
                
            </div>
              </div>
          </div>
          
      	 <p>&nbsp;</p>
          <div id="publication">
            <div id="box">
              <div id="titre_box">
                <p><strong>Nouvelles publication ?</strong></p>
              </div>
    	      <div id="sub_box">
    	        <p><strong>Restez informé :</strong></p>
              <div id="image_newsletter">
                <img src="<?php echo base_url();?>img/newsletter.png" />                </div>
              <p class="Abonn"><a href="<?php echo base_url();?>News_letter/abonner">Abonnez-vous à la newsletter Defense-Magazine.com</a></p>
            </div>
              </div>
          </div>  
      </div>