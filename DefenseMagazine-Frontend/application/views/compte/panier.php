<div id="osx-modal-content">
			<?php $img_path_panier = 'http://localhost/monprojet/image_produit/thumb/';?>
			<div id="osx-modal-title">Mon panier</div>
			<div class="close"><a href="#" class="simplemodal-close">x</a></div>
			<div id="osx-modal-data">
				<!---->
				<?php if ($cart = $this->cart->contents()){ ?>
				<table>	
				
				<thead>
					<tr>
						<th></th>
						<th align="left" width="150px" style="padding-left:30px">Titre</th>
						<th>Prix</th>
						<th></th>
					</tr>
				</thead>
				<?php foreach ($cart as $item):
					$prod_pn = $this->produit_model->get_produit($item['id']);
				?>
				
					<tr>
						<td><img src="<?php echo $img_path_panier.$prod_pn['url_image'];?>" width="55px" height="70" /></td>
						<td align="left" style="padding-left:30px"><?php echo $prod_pn['titre_produit']; ?></td>
						<td><?php echo $item['subtotal']; ?> DT</td>
						
					</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>
					<td align="right"><strong>Total&nbsp;&nbsp;&nbsp;</strong></td>
					<td><?php echo $this->cart->total(); ?> DT</td>
				</tr>
				</table>
				<?php }else{?>
					<p>Panier vide</p>
				      <?php } ?>	
				<!---->
				<div style="margin-top:50px; margin-buttom:20px;margin-left:30px;">
				<table cellspacing="30px">
					<tr>
						<td class="panier_bouton"><a href=""  class="simplemodal-close"><img src="<?php echo base_url().'/img/continuer_achat.png'?>" /></a></td>
						<td class="panier_bouton"><a href="<?php echo base_url().'panier'?>" ><img src="<?php echo base_url().'/img/terminer_cmd.png'?>" /></a></td>
					</tr>
				</table>
				  
				</div>
				
			</div>
</div>


<!-- Load JavaScript files -->

<script type='text/javascript' src='<?php echo base_url();?>js/panier/jquery.simplemodal.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/panier/osx.js'></script>