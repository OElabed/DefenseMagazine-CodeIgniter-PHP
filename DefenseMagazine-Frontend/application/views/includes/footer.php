
<div id="footer">
      <div id="separat_plaque"></div>
      
    <div id="footer_contenu">
      <div id="nav_menu">
        <ul>
          <li><a href="<?php echo base_url().'acceuil';?>">Acceuil</a>
            <ul>
              <li><a href="<?php echo base_url().'acceuil/nouveaute/';?>">Nouveautés</a></li>
                <li><a href="<?php echo base_url().'acceuil/meilleur_vendue/';?>">Meilleures ventes</a></li>
              </ul>
              </li>
			   <?php foreach($categ['list_categ_a'] as $row){?>
          <li><a href="<?php echo base_url().'categorie/categorie_affiche/'.$row->nom_categorie;?>"><?php echo $row->nom_categorie;?></a>
                <ul>
				<?php foreach($categ['list_categ_b'] as $row1){
						if($row1->categorie_pere == $row->id_categorie){
					 ?>
                  <li><a href="<?php echo base_url().'categorie/sous_categorie_affiche/'.$row1->nom_categorie;?>"><?php echo $row1->nom_categorie;?></a></li>
				  <?php } 
				  }?>
              </ul>
              </li>
			  <?php }?>
          </ul>
        </div>
        
      <div id="logo2">
        <img src="<?php echo base_url();?>img/logo2.png" alt="logo2" />        </div>
        
      <div id="copyright">©Individual. By Ltn Oussema EL Abed.</div>
      </div>
    </div>
  </div>
</div>

<!--fin wrapper -->
</body>
</html>
