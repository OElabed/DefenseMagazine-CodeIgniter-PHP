<div id="cont_int">

<div class="tablebox_autre">
<table>
                  			<thead>
                          <tr>
                            <th><div align="left" class="style1">La selection de la boutique</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
                              <tr>
                                <td width="10%"><div align="left"><strong>&Agrave; Gauche</strong></div></td>
                                <td class="info_ligne"><?php echo $gauche;?></td>
                              </tr>
							  <tr>
							  	<td></td>
                                <td>
								
								<?php echo form_open('vitrine/modif_select_gauche'); ?> 
								<select name="list_choix_g" style="width:200px;">
								
									<option value=" "></option>
									
									<?php foreach($query->result() as $list){
									
										echo '<option value="'.$list->id_produit.'">'.$list->titre_produit.'</option>';
									
									} ?>
								
								</select>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Modifier" />
								 <?php echo form_close()?>
								</td>
							  </tr>
                           
                            </table></td>
                            
                          </tr>
						  <tr class="row0">
						  <td><table width="200" border="0">
                              <tr>
                                <td width="10%"><div align="left"><strong>&Agrave; Droite</strong></div></td>
                                <td class="info_ligne"><?php echo $droite;?></td>
                              </tr>
							  <tr>
							  	<td></td>
                                <td>
								
								<?php echo form_open('vitrine/modif_select_droite'); ?> 
								<select name="list_choix_d" style="width:200px;">
								
									<option value=" "></option>
									
									<?php foreach($query->result() as $list){
									
										echo '<option value="'.$list->id_produit.'">'.$list->titre_produit.'</option>';
									
									} ?>
								
								</select>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Modifier" />
								  <?php echo form_close()?>
								</td>
							  </tr>
                           
                            </table></td>
						  </tr>
                          
</table>


</div>










</div>