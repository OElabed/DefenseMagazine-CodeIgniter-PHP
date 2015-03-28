          <div id="Selection_boutique">
            <h1>La selection de la boutique</h1>
            <img src="img/ligne.png" alt="ligne" />
            <!--à droite -->
            <div id="pright_selc">
              
			  
			  <?php 
			  
			   $monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
			  foreach($list_select->result() as $row){ ?>
			  	<?php if($row->id_selection == 1 ){?>
              <div id="prod_selectionner">
                <div id="prod_info">
                  <h3><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><?php echo $row->titre_produit; ?></a></h3>
                  <p id="cat_p">Catégorie : <a href="#"><?php echo $row->nom_categorie; ?></a></p>
                  <p id="Resum"><?php echo substr($row->resum_produit, 0, 200); ?>...</p>
                  <p id="ensavoir"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>">En savoir plus</a></p>
                </div>
                <div id="prod_tof"> <a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$row->url_image;?>" alt="<?php echo $row->titre_produit;?>" /></a> </div>
                <div id="prix_select">
                  <div id="prix_text">
                    <p id="prix_a">Prix DefenseMag:</p>
                    <p id="prix_b"><?php echo number_format($row->prix_uni_produit*$mult, 2);?> <?php echo $mon_type;?></p>
                  </div>
                </div>
				
				<script language="JavaScript">
									 	
										function validation_s1<?php echo $row->id_produit;?>(){
										document.forms[<?php echo '"pan_prod_s1_'.$row->id_produit.'"' ?>].submit();
										}
										</script>
				
				 <?php echo form_open('panier/add',array( 'name'=> 'pan_prod_s1_'.$row->id_produit)); ?>
                <p id="ajoutpanier">&gt; <a href="javascript:validation_s1<?php echo $row->id_produit;?>();">ajouter au panier</a></p>
				<?php echo form_hidden('id_prod',$row->id_produit);?>
									 <?php echo form_hidden('url_act',current_url());?>
									 <?php echo form_close();?>
              </div>
			  
			  <?php }} ?>
			  
          </div>
            <!--à gauche -->
            <div id="pleft_selc">
              
             <?php foreach($list_select->result() as $row){ ?>
			  	<?php if($row->id_selection == 2 ){?>
              <div id="prod_selectionner">
                <div id="prod_info">
                  <h3><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><?php echo $row->titre_produit; ?></a></h3>
                  <p id="cat_p">Catégorie : <a href="#"><?php echo $row->nom_categorie; ?></a></p>
                  <p id="Resum"><?php echo substr($row->resum_produit, 0, 200); ?>...</p>
                  <p id="ensavoir"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>">En savoir plus</a></p>
                </div>
                <div id="prod_tof"> <a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$row->url_image;?>" alt="<?php echo $row->titre_produit;?>" /></a> </div>
                <div id="prix_select">
                  <div id="prix_text">
                    <p id="prix_a">Prix DefenseMag:</p>
                    <p id="prix_b"><?php echo number_format($row->prix_uni_produit*$mult, 2);?> <?php echo $mon_type;?></p>
                  </div>
                </div>
                
				<script language="JavaScript">
									 	
										function validation_s2<?php echo $row->id_produit;?>(){
										document.forms[<?php echo '"pan_prod_s2_'.$row->id_produit.'"' ?>].submit();
										}
										</script>
				
				 <?php echo form_open('panier/add',array( 'name'=> 'pan_prod_s2_'.$row->id_produit)); ?>
                <p id="ajoutpanier">&gt; <a href="javascript:validation_s2<?php echo $row->id_produit;?>();">ajouter au panier</a></p>
				<?php echo form_hidden('id_prod',$row->id_produit);?>
									 <?php echo form_hidden('url_act',current_url());?>
									 <?php echo form_close();?>
				
              </div>
			  
			  <?php }} ?>
          </div>
        </div>
		<br/>
		  <br/>