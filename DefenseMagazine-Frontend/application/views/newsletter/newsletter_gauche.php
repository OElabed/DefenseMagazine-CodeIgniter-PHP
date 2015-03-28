        <div id="left_contenent">
          <!--3-2-b3)table panier -->
          	<?php 
			$is_logged_in = $this->session->userdata('is_logged_in');
			if($is_logged_in == true and $this->newsletter_model->exist_abonner($this->session->userdata('login')) == TRUE){
			?>
				<div id="panier_vide" style="width:300px;">
				<h3>Vous &ecirc;tes déjà abonner à Newsletter</h3>
				</div>
			<?php 	
			}else{
				include_once("newsletter_ajout.php");	
			}
			
			
			?>  
        </div>