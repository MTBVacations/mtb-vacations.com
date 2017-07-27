<?php 
//Usage: get_template_part('templates/parts/header', 'analytics');
//Descript: Hostname based google code, only run if on live site. Place right BEFORE </head>
$hostname = $_SERVER['HTTP_HOST']; //dev.zenman.com | localhost | Live server | etc..
$remote_addr = $_SERVER['REMOTE_ADDR']; //remote browser ip
$exclude_ip_range = array('173.164.136.221','69.15.186.249','127.0.0.1');

switch ($hostname) { 
  case 'mtbv.com': // Live site ?>
    <!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T6JWM69');</script>
	<!-- End Google Tag Manager -->
 <?php
    break;
  default:
    // Everything else do nothing
    break;
}
?>