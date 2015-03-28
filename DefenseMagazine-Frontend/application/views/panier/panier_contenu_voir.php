          <div id="top_vente">
            <h1>Mon Panier</h1>
            <img src="<?php echo base_url();?>img/ligne.png" alt="ligne" />
            <P>&nbsp;</P>
			
			<P>&nbsp;</P>
            <P id="top5"></P>

			
            <div id="top_model" style="max-height:900px;overflow:auto; margin-right:10px;">
			
			<?php
			$monnaie = $this->session->userdata('monnaie');
			 	 $mult= $monnaie['mult_mon'];
			  	 $mon_type= $monnaie['nom_mon'];
			
			 if ($cart = $this->cart->contents()){ ?>
			
            <table>
				 <script language="JavaScript">
									 	
										function validation(){
										document.forms["update_panier"].submit();
										}
										</script>
			
			<?php
					echo form_open('panier/valid_commande',array('name'=>'update_panier'));
					$j=0;
				 foreach ($cart as $item):
				 	$j++;
					$prod_pn = $this->Produit_model->get_produit($item['id']);
				?>
              <tr>
                <td id="col2"><a href="<?php echo base_url().'produit/produit_affiche/'.$row->id_produit;?>"><img src="<?php echo $img_path.$prod_pn['url_image'];?>" alt="<?php echo $prod_pn['titre_produit'];?>" style="margin-top:-15px;"/></a></td>
                <td id="col3">
               	  <div id="info_top">
               	    <div class="titre_top">
               	      <div align="left"><a href="<?php echo base_url().'produit/produit_affiche/'.$prod_pn['id_produit'];?>"><?php echo $prod_pn['titre_produit'];?></a></div>
               	    </div>
                 	<div class="info_top">
                        <p align="left">Catégorie : <?php echo $prod_pn['nom_categorie'];?></p>
                        <p align="left">Date de parution : <?php echo $prod_pn['Date_parution_produit'];?></p>
						<p align="left">Prix unitaire : <b><?php echo number_format($prod_pn['prix_uni_produit']*$mult, 2);?> <?php echo $mon_type;?></b></p>
                   </div>
                  </div>		      </td>
                <td width="206" height="139">
               	  <div id="panier_config">
				  		
						
						<script type="text/javascript"><!--
								function ReplaceContentInContainer<?php echo $j;?>(id,nb,prix) {
								var prix=parseFloat(prix);
								var nb=parseInt(nb);
								var container = document.getElementById(id);
								var result = nb * prix*<?php echo $mult;?>;
								container.innerHTML = result.toFixed(2)+ <?php echo '" '.$mon_type.'"';?>;
								}
								//--></script>
						
						
								  
				  
				  		<p><b><div id="<?php echo 'nbr_'.$j;?>"><?php echo number_format($item['subtotal']*$mult, 2) ;?> <?php echo $mon_type;?></div></b></p>
						<p>&nbsp;&nbsp;</p>
						<p><b>Nb.</b> <select name="<?php echo 'nbr_'.$j;?>" style="width: 40px" onchange="Total();ReplaceContentInContainer<?php echo $j;?>('<?php echo 'nbr_'.$j;?>',this.value,'<?php echo $prod_pn['prix_uni_produit'];?>')" >
										<option value="<?php echo $item['qty'];?>" selected="selected"><?php echo $item['qty'];?> </option>
										<?php for($i=1;$i<=$prod_pn['quantite_produit'];$i++){
											if($i !=$item['qty'] ){	
										?>
									  	
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										
										<?php }
											}?>
									  </select>
									   &nbsp;&nbsp;<a href="<?php echo base_url().'panier/remove/'.$item['rowid']?>"><img src="<?php echo base_url();?>img/pictoPoubelle.gif" alt="Supprimer"  border="0"/></a></p>
				  
				  
				  
				  
				  
				  
				  </div> 
				  
				  
				 
				  
				  
				  
				  
				                  
                </td>
              </tr>
			  
			  <?php endforeach; ?>
			  
            </table>
			
			<table border="0">
			
			
			<script type="text/javascript"><!--
								function Total() {
								var prix=0;
								var nb=0;
								var result = 0;
								var container = document.getElementById('total_vue');
								 <?php 
								 $j=0;
								 foreach ($cart as $item){
								 	$j++;
									 $prod_pn = $this->Produit_model->get_produit($item['id']);
								 ?>
								 prix = parseFloat(<?php echo $prod_pn['prix_uni_produit'];?>);
								 nb = parseInt(document.forms["update_panier"].elements[<?php echo '"'.'nbr_'.$j.'"';?>].value);
								 
								result = (nb * prix*<?php echo $mult;?>)+ result;
								<?php } ?>
								container.innerHTML = "<b>"+result.toFixed(2)+<?php echo '" '.$mon_type.'</b>"';?>;
								}
								//--></script>
			
			
			
			
			
			
			<tr class="total_panier">
				<td width="63%" align="right" ><b>TOTAL</b>  &nbsp;</td>
				<td><div id="total_vue"><b><?php echo number_format($this->cart->total()*$mult, 2); ?> <?php echo $mon_type;?></b></div></td>
			</tr>
			<tr class="modifier_vider_panier">
				<td><img src="<?php echo base_url();?>img/pictoPoubelle.gif" alt="Supprimer"  border="0"/> &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'panier/destroy/';?>">Vider le panier</a></td>
			</tr>
		</table>
			
			<?php 
				
			echo form_close();
			}else{?>
							
							<div id="panier_vide">
							<h3>Votre panier est vide</h3>
							</div>
				
					
			<?php } ?>  
			
            </div>
			<?php if ($cart = $this->cart->contents()){ ?>
			<div id="valide_cmd">
				<a href="javascript:validation();"><img src="<?php echo base_url();?>img/validerCommande.png" alt="valider" /></a>
			</div>
            <?php } ?>
            <P>&nbsp;</P>
            <P>&nbsp;</P>

         </div>