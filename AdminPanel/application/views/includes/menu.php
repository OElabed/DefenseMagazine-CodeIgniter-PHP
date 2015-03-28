
	<!--2)menu -->
    <div id="menu">
     
	   <div class="nav">
        <div class="table">
          <ul class="select">
            <li><a href="<?php echo base_url();?>tab_bord"><b>Tableau de bord</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url();?>tab_bord">Status</a></li>
                </ul>
                </div>
            </li>
          </ul>
          <ul class="select">
            <li><a href="<?php echo base_url();?>vitrine/selection"><b>Vitrine</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url();?>vitrine/selection">Sélection de site</a></li>
                  <li><a href="<?php echo base_url();?>vitrine/monnaie">Taux de change</a></li>
                </ul>
                </div>
            </li>
          </ul>
          <ul class="select">
            <li><a href="<?php echo base_url();?>produit"><b>Catalogue</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url();?>produit">Tous les produits</a></li>
                  <li><a href="<?php echo base_url();?>produit/ajout_produit">Ajouter produit</a></li>
                </ul>
                </div>
            </li>
          </ul>
          <ul class="select">
            <li><a href="<?php echo base_url();?>categorie"><b>Catégories</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url();?>categorie">Tous les catégories</a></li>
                  <li><a href="<?php echo base_url();?>categorie/ajouter_categorie">Ajouter catégorie</a></li>
                </ul>
                </div>
            </li>
          </ul>
		  <ul class="select">
            <li><a href="<?php echo base_url();?>client"><b>Clients</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url();?>client">Tous les clients</a></li>
                  <li><a href="<?php echo base_url();?>client/ajouter_client">Ajouter client</a></li>
                </ul>
                </div>
            </li>
          </ul>
          <ul class="select">
            <li><a href="<?php echo base_url();?>commande"><b>Commandes</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url();?>commande">Tous les commandes</a></li>
                  <li><a href="<?php echo base_url();?>commande/list_commande_livred">Commandes livrés</a></li>
                  <li><a href="<?php echo base_url();?>commande/list_commande_wait">Commandes en attente</a></li>
                  <li><a href="<?php echo base_url();?>commande/list_commande_Cancelled">Commandes annulés</a></li>
                </ul>
                </div>
            </li>
          </ul>
		  
           <ul class="select">
            <li><a href="<?php echo base_url();?>payment"><b>Payment</b></a>
              <div class="select_sub">
                <ul class="sub">
                  <li><a href="<?php echo base_url();?>payment">Toutes les transactions</a></li>
				  <li><a href="<?php echo base_url(); ?>Payment/transaction_conf">Trans des cmd confirmées</a></li>
				  <li><a href="<?php echo base_url(); ?>Payment/transaction_att">Trans des cmd en attentes</a></li>
				  <li><a href="<?php echo base_url(); ?>Payment/transaction_ann">Trans des cmd annulées</a></li>
                  <li><a href="<?php echo base_url(); ?>Payment/meth_pay">Méthodes de paiement</a></li>
                  <li><a href="<?php echo base_url();?>expedition">Formule d'expédition</a></li>
                </ul>
                </div>
            </li>
          </ul>
         </div>
      </div>
	 <div id="menu_secondaire"> </div>
    </div>