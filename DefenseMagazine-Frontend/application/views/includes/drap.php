 <div id="mode-content" style="display:none">
 
			<?php echo form_open('acceuil/change_monnaie',array('name' =>'drap'));?>
			<?php echo form_hidden('page_cour',current_url());?>
			<table style="width:100px;margin-left:auto;margin-right:auto;font-family:  Geneva, Arial, Helvetica, sans-serif;">
				<?php
				 $monnaie = $this->session->userdata('monnaie');
			  	 $mon_type= $monnaie['nom_mon'];
				
				 foreach($list_drap as $row){ 
				 if($mon_type != $row->nom_mon){?>
				 
				
			<tr>
				
				<td><img src="<?php echo base_url();?>drap/<?php echo $row->tof_pays;?>" /></td>
				<td><?php echo $row->nom_mon;?></td>
				<td><input type="radio" name="monnaie" value="<?php echo $row->nom_mon;?>" onClick="this.form.submit();"  /></td>
			</tr>
			<?php 
			}
			}?>
			
		</table>  
	  <?php echo form_close();?>
	  
 </div>