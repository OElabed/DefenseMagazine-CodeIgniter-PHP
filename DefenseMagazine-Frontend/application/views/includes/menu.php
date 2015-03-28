    <div id="menu">
      <div class="nav">
        <div class="table">
          <ul class="select">
            <li><a href="<?php echo base_url().'acceuil';?>"><b>Accueil</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url().'acceuil/nouveaute/';?>">Nouveautés</a></li>
                  <li><a href="<?php echo base_url().'acceuil/meilleur_vendue/';?>">Meilleures ventes</a></li>
                </ul>
                </div>
            </li>
          </ul>
		  <?php foreach($categ['list_categ_a'] as $row){?>
          <ul class="select">
            <li><a href="<?php echo base_url().'categorie/categorie_affiche/'.$row->nom_categorie;?>"><b><?php echo $row->nom_categorie;?></b></a>
              <div class="select_sub">
                <ul class="sub">
					<?php foreach($categ['list_categ_b'] as $row1){
						if($row1->categorie_pere == $row->id_categorie){
					 ?>
                  <li><a href="<?php echo base_url().'categorie/sous_categorie_affiche/'.$row1->nom_categorie;?>"><?php echo $row1->nom_categorie;?></a></li>
				  <?php } 
				  }?>                
				</ul>
                </div>
            </li>
          </ul>
		  
		  <?php }?>
          
        </div>
      </div>
      <div id="menu_secondaire"> </div>
    </div>