<div id="nouveau">
            <h1>Les nouveautés sur le même thème </h1>
            <img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
            
            <P>&nbsp;</P>
                    
				<div id="carousel">
				  <div class="list_carousel">
					<ul id="user_interaction">
						 <?php foreach($list_nouv_categ->result() as $row) {?>
					 	 <li><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$row->url_image;?>" alt="<?php echo $row->titre_produit;?>" /></a></li>
						 <?php } ?>
						
					</ul>
					
					<a id="prev1" href="#"><img src="<?php echo base_url();?>img/arrow-prev1.png" alt="prev" /></a>
					<a id="next1" href="#"><img src="<?php echo base_url();?>img/arrow-next1.png" alt="next" /></a>
				</div>
                
               
                    
			</div>
            
            <P>&nbsp;</P>
          </div>
		  