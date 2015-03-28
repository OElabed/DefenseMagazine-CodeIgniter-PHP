<div id="Contenu">
      <!--3-1)url ou héarchie -->
      <div id="url"> <a href="index.html"><img src="<?php echo base_url(); ?>img/fleche.png" alt="fleche" border="0" /></a>
        <p><a href="<?php echo base_url(); ?>categorie">Catégorie</a> &gt; <b>Ajouter catégorie</b></p>
      </div>
      <!--3-2)contenue essentielle -->
            <div id="Cont_ess">
            	<h2><?php echo $titre_interne ;?></h2>
                <img src="<?php echo base_url(); ?>img/ligne.png" />
             	<script type="text/javascript" src="<?php echo base_url(); ?>js/ajax_js/prototype.js"></script>
           	     
              <div id="cont_int">              
               <?php echo $categorie_view ;?>    
              </div>   
            </div>
    </div>