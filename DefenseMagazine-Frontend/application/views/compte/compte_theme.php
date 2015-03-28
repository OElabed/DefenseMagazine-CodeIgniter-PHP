    <div id="Contenu">
      <!--3-1)url ou héarchie -->
      <div id="url"> <a href="#"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="
		<?php
		   $is_logged_in = $this->session->userdata('is_logged_in');
		   if($is_logged_in == true){
		   	 echo base_url().'compte/voir_compte';
		   }else{
		   	echo base_url().'compte'; 
		   } 
		   ?>
		">Mon compte</a> &gt; <b><?php echo $fonction_titre;?></b></p>
      </div>
      <!--3-2)contenue essentielle -->
      <div id="Cont_ess">
        <!--3-2-a)contenu à droite -->
        <?php include_once($nom_vue_doite);?>  
        <!--fin contenu droite -->
		
        <!--3-2-b)contenu à gauche -->
		<?php include_once($nom_vue_gauche);?>  
        <!--fin contenu à gauche -->
      </div>
   	    <!--fin contenu essentielle -->
    </div>