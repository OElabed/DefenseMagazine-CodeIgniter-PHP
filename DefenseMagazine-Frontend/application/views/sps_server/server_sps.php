<html><head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SERVEUR DE PAIEMENT SECURISE</title>

<script src="<?php echo base_url();?>sps_server/ga.js" async="" type="text/javascript"></script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17452227-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head><body leftmargin="0" topmargin="0" vlink="#800080" link="#0000ff" marginheight="0" marginwidth="0"> 
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script> 
<script type="text/javascript" src="<?php echo base_url();?>sps_server/ConForm.js"></script> 
<?php echo form_open('commande/authorisation_cmd',array('autocomplete' => 'off','onsubmit' => 'return (ConForm(this));'));?>
<?php echo form_hidden('reference_tr',$Reference);?>
<table dir="ltr" align="center" bgcolor="White" border="0" cellpadding="0" cellspacing="1" width="31%">
      <tbody><tr> 
          <td align="right" width="38%">
            <a href="#"><img src="<?php echo base_url();?>sps_server/fr.gif" border="0"></a><a href="#"><img src="<?php echo base_url();?>sps_server/en.gif" border="0"></a><a href="#"><img src="<?php echo base_url();?>sps_server/de.gif" border="0"></a><a href="#"><img src="<?php echo base_url();?>sps_server/it.jpg" border="0"></a><a href="#"><img src="<?php echo base_url();?>sps_server/ar.jpg" border="0"></a>
          </td>
      </tr>
      <tr> 
        <td height="92">
          <div align="center"><img src="<?php echo base_url();?>sps_server/sps.gif" width="430" height="75"><br>
          <font face="Arial, Helvetica, sans-serif" size="2">Vous êtes en connexion sécurisée avec le serveur de paiement SPS</font><br>
          <font color="#990000" face="Arial, Helvetica, sans-serif" size="1"><strong>Adresse IP du client  : 197.1.100.207</strong></font> <br>
          <font face="Arial, Helvetica, sans-serif" size="3"><strong>FORMULAIRE DE PAIEMENT</strong></font></div>
        </td>
      </tr>
      <tr> 
        <td background="<?php echo base_url();?>sps_server/fnt.htm" height="72"><img src="<?php echo base_url();?>sps_server/top.gif" width="430" height="10"> 
      
	  <table align="center" border="0" cellpadding="0" cellspacing="1" width="385">
             <tbody><tr> 
                <td width="49%">
                  <font face="Arial, Helvetica, sans-serif" size="2"><strong>Identifiant commerçant :</strong></font>
                </td>
                <td width="51%"><div align="center"><font color="#990000" face="Arial, Helvetica, sans-serif" size="2"><strong> DEFENSE MAGAZINE</strong></font></div></td>
             </tr>
          <tr> 
            <td><font face="Arial, Helvetica, sans-serif" size="2"><strong>Montant de la transaction : </strong></font></td>
            <td><div align="center"><font color="#990000" face="Arial, Helvetica, sans-serif" size="2"><strong><?php echo $montant; ?> 
                TND </strong></font></div></td>
          </tr>
          <tr> 
            <td><font face="Arial, Helvetica, sans-serif" size="2"><strong>Référence de la transaction :</strong></font></td>
            <td><div align="center"><font color="#990000" face="Arial, Helvetica, sans-serif" size="2"><strong><?php echo $Reference;?></strong></font></div></td>
          </tr>
        </tbody></table>
        <img src="<?php echo base_url();?>sps_server/bas.gif" width="430" height="10"></td>
    </tr>
    <tr> 
      <td align="center" background="<?php echo base_url();?>sps_server/fnt.htm"><img src="<?php echo base_url();?>sps_server/top.gif" width="430" height="10"><br>
          <font face="Arial, Helvetica, sans-serif" size="2">Veuillez saisir les données relatives à votre carte bancaire</font>
        <table align="center" border="0" cellpadding="0" cellspacing="1" width="396">
          <tbody><tr> 
            <td width="49%"><strong><font face="Arial, Helvetica, sans-serif" size="2">Nom  
              : <br>
              </font></strong></td>
            <td width="51%"><input name="nom" size="15" maxlength="20" alt="nombre:exemple;bonfond:#FFFFFF;bontexte:#400040;

					  erreurfond:#FF0000;bontexte:#0000FF; type:obligatoire;erreur:Le Nom doit être renseigné" type="text">
              <font color="#ff0000" face="Arial, Helvetica, sans-serif" size="2">*</font></td>
          </tr>
          <tr> 
            <td><strong><font face="Arial, Helvetica, sans-serif" size="2">Prénom  
              : </font></strong></td>
            <td><input name="prenom" id="prenom" size="15" maxlength="20" alt="nombre:exemple; bonfond:#FFFFFF;bontexte:#400040;

					  erreurfond:#FF0000;bontexte:#0000FF; 

						type:obligatoire;erreur:Le Prenom doit être renseigné" type="text">
              <font color="#ff0000" face="Arial, Helvetica, sans-serif" size="2">*</font></td>
          </tr>
          
		  <tr> 
            <td><strong><font face="Arial, Helvetica, sans-serif" size="2">N° de la carte bancaire :</font></strong></td>
            <td><input name="NumCarte" size="19" maxlength="19" alt="nombre:exemple;

					  bonfond:#FFFFFF;bontexte:#400040;

					  erreurfond:#FF0000;bontexte:#0000FF;

					  type:obligatoire;erreur:N° de la Carte doit être renseigné" type="text">
              <font color="#ff0000" face="Arial, Helvetica, sans-serif" size="2">*</font></td>
          </tr>
          <tr> 
		    
            <td><strong><font face="Arial, Helvetica, sans-serif" size="2">Date d'expiration  : </font></strong></td>
            <td><font face="Arial, Helvetica, sans-serif" size="1">Mois</font><font color="#ff0000" face="Arial, Helvetica, sans-serif" size="1">*</font> 
                    <select name="mm">
					<option selected="selected" value=""></option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
              <font face="Arial, Helvetica, sans-serif" size="1">Année</font><font color="#ff0000" face="Arial, Helvetica, sans-serif" size="2">*</font> 
                    <select name="aa">

                      <option selected="selected" value=""></option>
                      <option value="11">2011</option>
                      <option value="12">2012</option>
					  <option value="13">2013</option>
                      <option value="14">2014</option>
                      <option value="15">2015</option>
                      <option value="16">2016</option>  
					  <option value="17">2017</option>
					  <option value="18">2018</option>
					  <option value="19">2019</option>
                    </select>
              </td>
          </tr>
          
		  <tr> 
            <td title="Le Cryptogramme visuel ou le CVV2 se compose de trois chiffres imprimés au verso de votre carte."><strong><font face="Arial, Helvetica, sans-serif" size="2">Cryptogramme visuel(CVV2)  :</font></strong></td>
            <td>                    
 		<input name="CVV2" size="3" value="" maxlength="3" alt="nom:exemple; bonfond:#FFFFFF;bontexte:#400040;

					  erreurfond:#FF0000;bontexte:#0000FF;

					  type:obligatoire;erreur: Le CVV2 doit être renseigné" type="password">
              <font color="#ff0000" face="Arial, Helvetica, sans-serif" size="2">*</font></td>
          </tr>
		    
          <tr> 
            <td><strong><font face="Arial, Helvetica, sans-serif" size="2">Email  
              :</font></strong></td>
			 
            <td><input name="Email" size="25" alt="nombre:exemple;bonfond:#FFFFFF;bontexte:#400040;

					  erreurfond:#FF0000;bontexte:#0000FF; type:mail;erreur:Le mail doit être renseigné" type="text">
              <font color="#ff0000" face="Arial, Helvetica, sans-serif" size="2">*</font></td>
          </tr>
        </tbody></table>
        <img src="<?php echo base_url();?>sps_server/bas.gif" width="430" height="10"></td>
    </tr>
    <tr> 
      <td background="<?php echo base_url();?>sps_server/fnt.htm"><img src="<?php echo base_url();?>sps_server/top.gif" width="430" height="10"> 
        <table align="center" border="0" cellpadding="0" cellspacing="1" width="385">
          
        <tbody><tr> 
            <td width="49%"><font face="Arial, Helvetica, sans-serif" size="2">Ressaisir le code en face  : <br>
              </font></td>
            <td width="51%"><img src="<?php echo base_url();?>sps_server/aspcaptcha.bmp" alt="code de verifcation" border="1" width="86" height="18">
		<input name="strCAPTCHA" id="strCAPTCHA" size="6" maxlength="6" alt="nombre:exemple;  type:obligatoire;erreur:Le code de verification doit être renseigné" type="text">
              <font color="#ff0000" face="Arial, Helvetica, sans-serif" size="2">*</font></td>
          </tr>
        </tbody></table>
         <img src="<?php echo base_url();?>sps_server/bas.gif" width="430" height="10"></td>
    </tr>
    <tr> 
      <td> <table align="center" border="0" cellpadding="0" cellspacing="1" width="97%">
          <tbody><tr> 
            <td width="49%"><font face="Arial, Helvetica, sans-serif" size="2"><img src="<?php echo base_url();?>sps_server/logos.gif" width="195" height="31">
            </font></td><td width="51%"><div align="center"> 
                <input name="Submit" value="PAIEMENT " type="submit">
              </div></td>
          </tr>
          <tr> 
            <td colspan="2"><font color="#990000" face="Arial, Helvetica, sans-serif" size="1">(*) Information obligatoire .</font></td>
          </tr>
        </tbody></table></td>
    </tr>
    <tr> 
      <td height="2"><img src="<?php echo base_url();?>sps_server/top.gif" width="430" height="10"></td>
    </tr><tr>
	 <td> 
		<table align="center" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td title="Cliquez pour vérifier - Ce site a choisi le SSL VeriSign pour sécuriser le commerce électronique et les communications confidentielles." align="center"><script src="<?php echo base_url();?>sps_server/getseal"></script><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" id="s_s" align="" width="100" height="72"> <param name="movie" value="https://seal.verisign.com/getseal?at=1&amp;sealid=2&amp;dn=www.smt-sps.com.tn&amp;lang=fr"> <param name="loop" value="false"> <param name="menu" value="false"> <param name="quality" value="best"> <param name="wmode" value="transparent"> <param name="allowScriptAccess" value="always"> <embed src="<?php echo base_url();?>sps_server/getseal.swf" loop="false" menu="false" quality="best" wmode="transparent" swliveconnect="FALSE" name="s_s" type="application/x-shockwave-flash" pluginspage="https://www.macromedia.com/go/getflashplayer" allowscriptaccess="always" align="" width="100" height="72">  </object><br>
				<a href="http://www.verisign.fr/ssl/ssl-information-center/" target="_blank" style="color: rgb(0, 0, 0); text-decoration: none; font: bold 7px verdana,sans-serif; letter-spacing: 0.5px; text-align: center; margin: 0px; padding: 0px;">&#192; propos des certificats SSL</a></td>
				<td align="center"><a href="http://www.visacemea.com/uv/online_security.jsp" target="new"><img src="<?php echo base_url();?>sps_server/verified_by_visa_p1.gif" border="0"></a></td>
				<td align="center"><a href="http://www.mastercard.com/ca/merchant/fr/solutions/securecode/securecode_faq.html" target="new"><img src="<?php echo base_url();?>sps_server/secure_code_p1.gif" border="0"></a></td>

			</tr>
		</tbody></table>
	 </td>
    </tr>
	<tr>
		<td align="center" height="2"><img src="<?php echo base_url();?>sps_server/bas.gif" width="430" height="10"></td>
	</tr>
</tbody></table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="390">
    <tbody><tr> 
      <td><font color="#003311" face="Arial, Helvetica, sans-serif" size="1">
			Monétique Tunisie<br>
			Site web: www.clictopay.com.tn<br>
			e-mail : support@monetique.com.tn</font>
      </td>
	  <td align="right" valign="top">
	  </td>  
    </tr>
	
  </tbody></table>  </form>
</body></html>