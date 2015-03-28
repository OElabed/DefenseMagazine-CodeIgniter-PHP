<div id="cont_int">


      
              <div class="tablebox_autre">
                
                  <table>
                  			<thead>
                          <tr>
                            <th><div align="left" class="style1">Détails de livraison</div></th>
                            </tr>
                          </thead>
                          <tr class="row0">
                          	
                            <td>
							<table width="200" border="0">
                              <tr>
                                <td width="26%"><div align="left"><strong>Info</strong></div></td>
                                <td width="74%" class="info_ligne">Livraison normale par colis postal</td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Délais livraison</strong></div></td>
                                <td class="info_ligne"></td>
							</tr>
                              <tr>
                                <td></td>
                                <td>
									<table>
										<tr>
											<td><u><b>National</b></u></td>
											<td>  3-4 jours ouverts</td>
										</tr>
										<tr>
											<td><u><b>Pays du Maghreb Arabes</b></u></td>
											<td> 4 jours ouverts</td>
										</tr>
										<tr>
											<td><u><b>Pays Arabes</b></u></td>
											<td> 7 à 12 jours ouverts</td>
										</tr>
										<tr>
											<td><u><b>Europe</b></u></td>
											<td> 7 à 12 jours ouverts</td>
										</tr>
										<tr>
											<td><u><b>Reste du monde</b></u></td>
											<td> 8 à 20 jours ouverts</td>
										</tr>
									</table>
									 
								</td>
                              </tr>
							  <tr>
                                <td><div align="left"><strong>Poids Maximal</strong></div></td>
                                <td class="info_ligne">30 Kg</td>
							</tr>
                            </table>
							</td>
                            
                          </tr>
                          
                  </table>
              </div>
			  
			  <div style="margin-top:20px;">
					<div class="tablebox_autre">
					
						<script type="text/javascript"><!--
						
						
						function calcul() {
							
							var pays = parseInt(document.frais_standard.selectpays.value);
							var poids = parseInt(document.frais_standard.poids.value);
							if (pays == 1){
								if(poids <= 2000 ){
									
									document.frais_standard.resultat.value = 3.000;	
								}else{
									document.frais_standard.resultat.value = 3.000 + 0.200 * Math.ceil((poids-2000)/1000);
								}
								
							}
							
							
							if (pays == 2){
								if(poids <= 2000 ){
									
									document.frais_standard.resultat.value = 6.000 ;	
								}else{
									document.frais_standard.resultat.value = 6.000  + 2.000  * Math.ceil((poids-2000)/1000);
								}
								
							}
							
							if (pays == 3){
								if(poids <= 2000 ){
									
									document.frais_standard.resultat.value = 9.000;	
								}else{
									document.frais_standard.resultat.value = 9.000 + 2.800  * Math.ceil((poids-2000)/1000);
								}
								
							}
							
							if (pays == 4){
								if(poids <= 2000 ){
									
									document.frais_standard.resultat.value = 9.000;	
								}else{
									document.frais_standard.resultat.value = 9.000 + 2.800  * Math.ceil((poids-2000)/1000);
								}
								
							}
							
							if (pays == 5){
								if(poids <= 2000 ){
									
									document.frais_standard.resultat.value = 15.000;	
								}else{
									document.frais_standard.resultat.value = 15.000 + 7.000 * Math.ceil((poids-2000)/1000);
								}
								
							}
							
						}

						
						
						//-->
						</script>
					                <form name="frais_standard">

					                  <table>
					                  			<thead>
					                          <tr>
					                            <th><div align="left" class="style1">Calcul des frais de livraison</div></th>
					                            </tr>
					                          </thead>
					                          <tr class="row0">
					                          	
					                            <td><table width="200" border="0">
					                              <tr>
					                                <td width="26%"><div align="left"><strong>Pays destinataire</strong></div></td>
													<td>
														<select name="selectpays" size="1"  style="width:200px;" >
															<option value=""> </option>
															<option value="1">Tunisie</option>
															<option value="2">Pays du Maghreb Arabes</option>
															<option value="3">Pays Arabes</option>
															<option value="4">Europe</option>
															<option value="5">Reste du monde</option>
														</select>
													</td>
					                              </tr>
												  
					                              <tr>
					                                <td><div align="left"></div></td>
													<td>
														<div>
															<input type="text" name="poids" maxlength="100" size="10" /> <b>en gr</b>
															&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;
															<input type="button" name="calculer" value="Calculer" onClick="calcul();">
															&nbsp;&nbsp;&nbsp;&nbsp;
															<input type="text" name="resultat" maxlength="100" size="10" /> <b>TND</b>	
														</div>
													</td>
					                              </tr>
												  <tr>
					                                <td><div align="left"><strong>Frais d'emballage</strong></div></td>
					                                <td class="info_ligne">1 TND</td>
												</tr>
												  
												</table></td>
					                            
					                          </tr>
					                          
					                  </table>
									  </form>
					</div>
			</div>
			
			<div style="margin-top:20px;">
              <div class="tablebox_autre">
                
                  <table cellpadding="50">
                          <tr class="row0">
                          	
                            <td><table width="200" border="0">
                              <tr>
                                <td width="50%">
									<div align="center">
                                    	<button name="button" class="retour" value="" onclick="self.location.href='<?php echo base_url(); ?>Expedition'"></button>
									</div>
								</td>
                              </tr>
                            </table></td>
                            
                          </tr>
                          
                  </table>
              </div>
              </div>
              

 





</div>