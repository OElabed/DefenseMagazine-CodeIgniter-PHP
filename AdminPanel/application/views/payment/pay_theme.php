<div id="Contenu">
      <!--3-1)url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>payment">Paiement</a> &gt; <b><?php echo $fonction_titre ;?></b></p>
      </div>
      <!--3-2)contenue essentielle -->
            <div id="Cont_ess">
            	<h2><?php echo $titre_interne ;?></h2>
                <img src="<?php echo base_url(); ?>img/ligne.png" />	  
			  	
				<!--Contenu chargé-->
           	     <?php include_once($nom_vue);?>                 
				<!--Fin Contenu-->                  
            </div>
    </div>