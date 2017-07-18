<?php 
//Descript: Hostname based google code, only run if on live site. Place right BEFORE </head>
$hostname = $_SERVER['HTTP_HOST']; //dev.zenman.com | localhost | Live server | etc..
$remote_addr = $_SERVER['REMOTE_ADDR']; //remote browser ip
$exclude_ip_range = array('173.164.136.221','69.15.186.249','127.0.0.1');

switch ($hostname) { 
  case 'mtbv.com': // Live site ?>
    <!-- Enable DoubleClick for Publishers -->
    <script type='text/javascript'>
      var googletag = googletag || {};
      googletag.cmd = googletag.cmd || [];
      (function() {
        var gads = document.createElement('script');
        gads.async = true;
        gads.type = 'text/javascript';
        var useSSL = 'https:' == document.location.protocol;
        gads.src = (useSSL ? 'https:' : 'http:') +
          '//www.googletagservices.com/tag/js/gpt.js';
        var node = document.getElementsByTagName('script')[0];
        node.parentNode.insertBefore(gads, node);
      })();
    </script> <?php
    break;
  default:
    // Everything else do nothing
    break;
}
?>

