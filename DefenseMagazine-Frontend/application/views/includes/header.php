<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
<title><?php echo $titre_page ;?></title>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.carouFredSel-4.0.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/super/jquery.superbox-min.js"></script>
	
	<script type="text/javascript">
		$(function(){
			$.superbox.settings = {
				boxId: "superbox", // Id attribute of the "superbox" element
				boxClasses: "", // Class of the "superbox" element
				overlayOpacity: .8, // Background opaqueness
				boxWidth: "500", // Default width of the box
				boxHeight: "400", // Default height of the box
				loadTxt: "Loading...", // Loading text
				closeTxt: "Close", // "Close" button text
				prevTxt: "Previous", // "Previous" button text
				nextTxt: "Next" // "Next" button text

			};
			$.superbox();
		});
	</script>
	
	<script type="text/javascript" language="javascript">
			$(function() {

				$('ul#basic_config').carouFredSel();
				$('ul#user_interaction').carouFredSel({
					prev: '#prev1',
					next: '#next1',
					auto: false
				});
				$('#vnoviwvw').carouFredSel({
					scroll: 1,
					padding: 'auto',
					width: 360,
					next: '#next2',
					prev: '#prev2',
					auto: false
				});
			});
		</script>
	<!--cart-->
	
	
	<!-------->
        
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
<!-- -->
<link rel="stylesheet" href="<?php echo base_url();?>js/super/jquery.superbox.css" type="text/css" media="all" />

<!-- -->

</head>

<body>
<div id="shadow">
  <div id="wrapper">
    <!--1)entete -->
    <div id="header">
      <div id="top_link">
        <ul>
          <li>
		  <?php $is_logged_in = $this->session->userdata('is_logged_in');
			  if($is_logged_in == true)
				{
					echo '<b>'.$this->session->userdata('login').'</b> ( <a href="'. base_url().'compte/logout">déconnexion</a> )';
			
			}else{
				?>
			 <a href="<?php echo base_url().'compte'; ?>">S'inscrire</a>
			<?php
			}	
		  ?>
		 
		  
		  </li>
          <li>|</li>
          <li><a href="<?php
		   
		   if($is_logged_in == true){
		   	 echo base_url().'compte/voir_compte';
		   }else{
		   	echo base_url().'compte'; 
		   } 
		   ?>">Mon compte</a></li>
		   <li> </li>
		   <li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#mode-content" rel="superbox[content][300x300]">
		   <?php
		    if(!$this->session->userdata('monnaie')){ 
			$newdata = array(
				'nom_mon' => 'TND' ,
				'mult_mon' => 1.000 ,
				'tof_pays' => 'p-tunisie.jpg'

			);
			
			$this->session->set_userdata('monnaie', $newdata);
			 }
			  $monnaie = $this->session->userdata('monnaie');
		   	?>
			
			<img src="<?php echo base_url();?>drap/<?php echo $monnaie['tof_pays'];?>" />
		   </a></li>
        </ul>
      </div>
	  
	  
	 <?php include_once("drap.php");?>
	  
	  
	  
	  
	  <!--panier-->
			<?php include_once("panier.php");?>
	<!--panier-->
      <div id="logo"><a href="<?php echo base_url();?>acceuil"><img src="<?php echo base_url();?>img/logo.png" alt="logo" /></a>		  </div>
      <div id="panier_wrapper">
	  	<?php $prod_nb = 0;
			  foreach ($cart as $item){
			  	$prod_nb++; 
			  }
			  
		?>
        <div id="panier"> <a href="#" class='panier'>Mon panier</a><span><?php  echo $prod_nb;?> produit</span> </div>
      </div>
      <div id="recherche">
		<?php
			echo form_open('recherche',array('name' =>'recherche'));
		?>
          <table id="tab_recherche">
            <tr>
              <td><input name="search" class="text_recherche" type="text" /></td>
              <td ><input class="date_vendu" value="" type="submit" /></td>
            </tr>
          </table>
		  <?php
		  	echo form_close();
		  ?>
      </div>
    </div>
	
	