<?php 
//Usage: get_template_part('templates/parts/header', 'analytics');
//Descript: Hostname based google code, only run if on live site. Place right BEFORE </head>
$hostname = $_SERVER['HTTP_HOST']; //dev.zenman.com | localhost | Live server | etc..
$remote_addr = $_SERVER['REMOTE_ADDR']; //remote browser ip
$exclude_ip_range = array('173.164.136.221','69.15.186.249','127.0.0.1');

switch ($hostname) {
    case 'localhost': //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case (strstr($hostname, '8888') == true): //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case 'dev1.zenman.com': //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case 'test1.zenman.com': //do nothing
        echo '<!-- no google analytics code -->';
        break;
    case 'stage1.zenman.com': //mimic live environment...
        if(isset($remote_addr) && false == in_array($remote_addr, $exclude_ip_range)){ ?>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-65539110-1', 'auto');
              ga('send', 'pageview');

            </script>
        <?php }else{ ?>
            <!-- No GA code for Zenman! -->
        <?php
        }
        break;
    default: //this is what you get on live server
        if(isset($remote_addr) && false == in_array($remote_addr, $exclude_ip_range)){ ?>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-65539110-1', 'auto');
              ga('send', 'pageview');

            </script>
        <?php }else{ ?>
            <!-- No GA code for Zenman! -->
        <?php
        }
        break;
}
?>