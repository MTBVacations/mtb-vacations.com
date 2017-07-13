<?php 
//Usage: get_template_part('templates/parts/header', 'analytics');
//Descript: Hostname based google code, only run if on live site. Place right BEFORE </head>
$hostname = $_SERVER['HTTP_HOST']; //dev.zenman.com | localhost | Live server | etc..
$remote_addr = $_SERVER['REMOTE_ADDR']; //remote browser ip
$exclude_ip_range = array('173.164.136.221','69.15.186.249','127.0.0.1');

switch ($hostname) { 
  case 'mtbv.com': // Live site ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-73066983-1', 'auto');
      ga('send', 'pageview');

    </script> <?php
    break;
  default:
    // Everything else do nothing
    break;
}
?>