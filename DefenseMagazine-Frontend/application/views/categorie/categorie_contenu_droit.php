<div id="right_contenant">
          
		   <div id="Dernier achat">
          <div id="box">
            <div id="titre_box">
              <p><strong>Menu</strong></p>
              </div>
   	             <div id="sub_box">
				 <div id="menu_categ"> 
				 <?php foreach($categ['list_categ_a'] as $row){
				 		if($row->nom_categorie == $fonction_titre){?>
						 <p class="select_categ"><a href="<?php echo base_url().'categorie/categorie_affiche/'.$row->nom_categorie;?>">> <?php echo $row->nom_categorie;?></a></p>
							 <div id="menu_sous_categ">
								<?php foreach($categ['list_categ_b'] as $row1){
									if($row1->categorie_pere == $row->id_categorie){
								 ?>

					 			<p><a href="<?php echo base_url().'categorie/sous_categorie_affiche/'.$row1->nom_categorie;?>">> <?php echo $row1->nom_categorie;?></a></p>
							 
																				<?php
																					}}?>
							</div>		
							
							<?php
							}
							else
							{
							?>
					
								 <p><a href="<?php echo base_url().'categorie/categorie_affiche/'.$row->nom_categorie;?>">> <?php echo $row->nom_categorie;?></a></p>
				 
				 	<?php }}?>
				 </div>
			
           		 </div>
           </div>
          </div>
          
      	 <p>&nbsp;</p>
		  
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
          

          <div id="publication">
            <div id="box">
              <div id="titre_box">
                <p><strong>Nouvelles publication ?</strong></p>
              </div>
    	      <div id="sub_box">
    	        <p><strong>Restez informé :</strong></p>
              <div id="image_newsletter">
                <img src="<?php echo base_url();?>img/newsletter.png" />               
			 </div>
              <p class="Abonn"><a href="<?php echo base_url();?>News_letter/abonner">Abonnez-vous à la newsletter Defense-Magazine.com</a></p>
            </div>
              </div>
          </div>  
      </div>