 <div id="cont_int">  
              <h3>Taux de change par rapport TND</h3>
                <div class="tablebox_tabbord">
                
                  <table>
                          <?php  
						  	$i = 1;
						  foreach($list_drap as $row){
						   ?>
						  <tr class="<?php if ($i%2) echo "row0 "; else echo "row1 ";?>">
                            <td><img src="<?php echo base_url();?>drap/<?php echo $row->tof_pays;?>" border="0" />&nbsp;&nbsp;<?php echo $row->nom_mon;?> : <?php echo $row->details;?></td>
                            <td id="nbre"><?php echo $row->mult_mon;?></td>
							<td align="center"><a href='<?php echo base_url().'vitrine/modif_monnaie/'.$row->id_mon; ?>' title=""><img src="<?php echo base_url(); ?>img/icons/edit_small.gif" alt="" title="Editer" border="0"/></a></td>
                          </tr>
						  <?php } ?>
						  
	
                  </table>
              </div>

                 

                
              </div>   