<?php

/**
 * Based roughly on wp-login.php @revision 19414
 * http://core.trac.wordpress.org/browser/trunk/wp-login.php?rev=19414
 */

global $Password_Protected, $error, $is_iphone;

/**
 * WP Shake JS
 */
if ( ! function_exists( 'wp_shake_js' ) ) {
	function wp_shake_js() {
		global $is_iphone;
		if ( $is_iphone ) {
			return;
		}
		?>
		<script type="text/javascript">
		addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
		function s(id,pos){g(id).left=pos+'px';}
		function g(id){return document.getElementById(id).style;}
		function shake(id,a,d){c=a.shift();s(id,c);if(a.length>0){setTimeout(function(){shake(id,a,d);},d);}else{try{g(id).position='static';wp_attempt_focus();}catch(e){}}}
		addLoadEvent(function(){ var p=new Array(15,30,15,0,-15,-30,-15,0);p=p.concat(p.concat(p));var i=document.forms[0].id;g(i).position='relative';shake(i,p,20);});
		</script>
		<?php
	}
}

nocache_headers();
header( 'Content-Type: ' . get_bloginfo( 'html_type' ) . '; charset=' . get_bloginfo( 'charset' ) );

// Set a cookie now to see if they are supported by the browser.
setcookie( TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN );
if ( SITECOOKIEPATH != COOKIEPATH ) {
	setcookie( TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN );
}

// If cookies are disabled we can't log in even with a valid password.
if ( isset( $_POST['testcookie'] ) && empty( $_COOKIE[TEST_COOKIE] ) ) {
	$Password_Protected->errors->add( 'test_cookie', __( "<strong>ERROR</strong>: Cookies are blocked or not supported by your browser. You must <a href='http://www.google.com/cookies.html'>enable cookies</a> to use WordPress.", 'password-protected' ) );
}

// Shake it!
$shake_error_codes = array( 'empty_password', 'incorrect_password' );
if ( $Password_Protected->errors->get_error_code() && in_array( $Password_Protected->errors->get_error_code(), $shake_error_codes ) ) {
	add_action( 'password_protected_login_head', 'wp_shake_js', 12 );
}

// Obey privacy setting
add_action( 'password_protected_login_head', 'noindex' );

/**
 * Support 3rd party plugins
 */
if ( class_exists( 'CWS_Login_Logo_Plugin' ) ) {
	// Add support for Mark Jaquith's Login Logo plugin
	// http://wordpress.org/extend/plugins/login-logo/
	add_action( 'password_protected_login_head', array( new CWS_Login_Logo_Plugin, 'login_head' ) );
} elseif ( class_exists( 'UberLoginLogo' ) ) {
	// Add support for Uber Login Logo plugin
	// http://wordpress.org/plugins/uber-login-logo/
	 add_action( 'password_protected_login_head', array( 'UberLoginLogo', 'replaceLoginLogo' ) );
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php echo apply_filters( 'password_protected_wp_title', get_bloginfo( 'name' ) ); ?></title>
<link rel="stylesheet" href="<?php echo plugins_url('/theme/css/styles.css', dirname(__FILE__)); ?>" type="text/css">
<?php

global $wp_version;

if ( version_compare( $wp_version, '3.9-dev', '>=' ) ) {
	wp_admin_css( 'login', true );
} else {
	wp_admin_css( 'wp-admin', true );
	wp_admin_css( 'colors-fresh', true );
}

if ( $is_iphone ) {
	?>
	<meta name="viewport" content="width=320; initial-scale=0.9; maximum-scale=1.0; user-scalable=0;" />
	<style type="text/css" media="screen">
	.login form, .login .message, #login_error { margin-left: 0px; }
	.login #nav, .login #backtoblog { margin-left: 8px; }
	.login h1 a { width: auto; }
	#login { padding: 20px 0; }
	</style>
	<?php
}

do_action( 'login_enqueue_scripts' );
do_action( 'password_protected_login_head' );
?>

</head>
<body class="login login-password-protected login-action-password-protected-login wp-core-ui">

<div id="login">
	<h1>
		<a href="<?php echo esc_url( apply_filters( 'password_proteced_login_headerurl', 'http://www.zenman.com' ) ); ?>" title="<?php echo esc_attr( apply_filters( 'password_protected_login_headertitle', get_bloginfo( 'name' ) ) ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="244.833px" height="50px" viewBox="385 475 244.833 50" enable-background="new 385 475 244.833 50" xml:space="preserve"><g display="none"><g display="inline"><path fill="#ffffff" d="M974 439c0-7 6-13 13-13s13 5 13 13c0 7-6 13-13 13C979 452 974 446 974 439z M997 439c0-6-5-11-11-11 s-10 4-10 11c0 6 4 11 10 11C993 450 997 445 997 439z M992 446h-3l-2-3h-1h-2v3h-3v-14h4c4 0 6 2 6 5c0 2-1 4-3 5L992 446z M986 440c2 0 3-1 3-3s-1-3-3-3h-2v6H986z"/></g><g display="inline"><path fill="#ffffff" d="M1 544l70-77H3v-31h115v27l-70 77h70v31H1V544z"/><path fill="#ffffff" d="M137 504L137 504c0-39 28-71 67-71c45 0 66 35 66 73c0 3 0 7-1 10h-94c4 17 16 27 33 27c13 0 22-4 33-14 l22 19c-13 16-31 25-55 25C167 574 137 545 137 504z M232 492c-2-17-12-29-29-29c-16 0-26 11-29 29H232z"/><path fill="#ffffff" d="M298 435h38v19c9-11 20-22 40-22c29 0 46 19 46 50v88h-38v-76c0-18-9-28-23-28c-15 0-24 9-24 28v76h-38 V435H298z"/><path fill="#ffffff" d="M456 435h38v19c9-11 20-22 40-22c18 0 31 8 38 21c12-14 26-21 44-21c29 0 46 17 46 50v88h-38v-76 c0-18-8-28-22-28s-23 9-23 28v76h-39v-76c0-18-8-28-22-28s-23 9-23 28v76h-38V435H456z"/><path fill="#ffffff" d="M688 532L688 532c0-30 22-44 55-44c14 0 23 2 33 6v-2c0-16-10-25-29-25c-15 0-25 3-37 7l-10-29 c15-7 30-11 53-11c21 0 36 6 46 15c10 10 15 25 15 43v79h-37v-15c-9 10-22 17-41 17C708 573 688 559 688 532z M776 523v-7 c-7-3-15-5-25-5c-16 0-27 7-27 19l0 0c0 10 9 16 21 16C764 547 776 537 776 523z"/><path fill="#ffffff" d="M845 435h38v19c9-11 20-22 40-22c29 0 46 19 46 50v88h-38v-76c0-18-9-28-23-28c-15 0-24 9-24 28v76h-38 V435H845z"/></g></g><g><g><g><defs><rect x="382" y="475.4" width="51.1" height="51.1"/></defs><clipPath><use xlink:href="#SVGID_1_" overflow="visible"/></clipPath><g clip-path="url(#SVGID_2_)"><g><defs><rect x="382" y="475.4" width="51.1" height="51.1"/></defs><clipPath><use xlink:href="#SVGID_3_" overflow="visible"/></clipPath><path clip-path="url(#SVGID_4_)" fill="#F79122" d="M407.405 516.022c0.102-0.103 22.594-22.543 0-22.543 C384.812 493.4 407.3 515.9 407.4 516.022c-10.684-4.142-21.367-8.333-21.367 0 C386.038 524.3 396.7 520.2 407.4 516.022L407.405 516.022c10.684 4.1 21.4 8.3 21.4 0 C428.772 507.7 418.1 511.8 407.4 516 M407.405 492.967c2.607 0 4.703-2.914 4.703-6.441 c0-3.578-2.096-6.44-4.703-6.44s-4.703 2.913-4.703 6.44C402.702 490.1 404.8 493 407.4 493"/></g></g></g></g></g><g><g><path fill="#ffffff" d="M623.023 493.45c0-1.374 1.177-2.551 2.553-2.551c1.374 0 2.6 1 2.6 2.6 c0 1.374-1.177 2.551-2.551 2.551C624.006 496 623 494.8 623 493.45z M627.537 493.4 c0-1.178-0.979-2.159-2.159-2.159c-1.178 0-1.961 0.785-1.961 2.159c0 1.2 0.8 2.2 2 2.2 C626.754 495.6 627.5 494.6 627.5 493.45z M626.558 494.824h-0.59l-0.392-0.589h-0.198h-0.392v0.589h-0.587v-2.748h0.783 c0.785 0 1.2 0.4 1.2 0.981c0 0.393-0.195 0.785-0.587 0.981L626.558 494.824z M625.378 493.6 c0.395 0 0.59-0.196 0.59-0.589c0-0.392-0.195-0.588-0.59-0.588h-0.392v1.177H625.378z"/></g><g><path fill="#ffffff" d="M432.066 514.058l13.737-15.112h-13.345v-6.083h22.57v5.298l-13.738 15.114h13.738v6.083h-22.962V514.058z "/><path fill="#ffffff" d="M458.756 506.206L458.756 506.206c0-7.654 5.496-13.934 13.15-13.934c8.832 0 13 6.9 13 14.3 c0 0.6 0 1.375-0.196 1.964h-18.449c0.786 3.3 3.1 5.3 6.5 5.299c2.553 0 4.317-0.786 6.476-2.746l4.317 3.7 c-2.55 3.14-6.082 4.907-10.793 4.907C464.645 519.9 458.8 514.3 458.8 506.206z M477.402 503.9 c-0.395-3.336-2.356-5.692-5.694-5.692c-3.139 0-5.102 2.16-5.69 5.692H477.402z"/><path fill="#ffffff" d="M490.355 492.666h7.458v3.728c1.765-2.159 3.923-4.317 7.849-4.317c5.691 0 9 3.7 9 9.8 v17.271h-7.457v-14.914c0-3.534-1.766-5.496-4.515-5.496c-2.943 0-4.709 1.767-4.709 5.496v14.914h-7.458v-26.494H490.355z"/><path fill="#ffffff" d="M521.363 492.666h7.458v3.728c1.766-2.159 3.924-4.317 7.85-4.317c3.532 0 6.1 1.6 7.5 4.1 c2.354-2.748 5.103-4.122 8.634-4.122c5.691 0 9 3.3 9 9.812v17.271h-7.458v-14.914c0-3.534-1.569-5.496-4.317-5.496 c-2.746 0-4.514 1.767-4.514 5.496v14.914h-7.652v-14.914c0-3.534-1.57-5.496-4.318-5.496c-2.749 0-4.514 1.767-4.514 5.5 v14.914h-7.457v-26.494H521.363z"/><path fill="#ffffff" d="M566.895 511.702L566.895 511.702c0-5.887 4.317-8.636 10.793-8.636c2.75 0 4.5 0.4 6.5 1.2 v-0.394c0-3.141-1.963-4.906-5.691-4.906c-2.944 0-4.907 0.589-7.262 1.374l-1.963-5.691c2.944-1.374 5.89-2.159 10.402-2.159 c4.121 0 7.1 1.2 9 2.944c1.964 2 2.9 4.9 2.9 8.438v15.505h-7.264v-2.943 c-1.765 1.962-4.317 3.336-8.045 3.336C570.821 519.7 566.9 517 566.9 511.702z M584.165 509.937v-1.374 c-1.372-0.589-2.944-0.981-4.905-0.981c-3.14 0-5.299 1.374-5.299 3.728l0 0c0 2 1.8 3.1 4.1 3.1 C581.811 514.6 584.2 512.7 584.2 509.937z"/><path fill="#ffffff" d="M597.708 492.666h7.457v3.728c1.766-2.159 3.924-4.317 7.851-4.317c5.69 0 9 3.7 9 9.812v17.271 h-7.458v-14.914c0-3.534-1.765-5.496-4.514-5.496c-2.943 0-4.709 1.767-4.709 5.496v14.914h-7.458v-26.494H597.708z"/></g></g></svg>
		</a>
	</h1><!-- zenman -->
	<?php

	// Add message
	$message = apply_filters( 'password_protected_login_message', '' );
	if ( ! empty( $message ) ) {
		echo $message . "\n";
	}

	if ( $Password_Protected->errors->get_error_code() ) {
		$errors = '';
		$messages = '';
		foreach ( $Password_Protected->errors->get_error_codes() as $code ) {
			$severity = $Password_Protected->errors->get_error_data( $code );
			foreach ( $Password_Protected->errors->get_error_messages( $code ) as $error ) {
				if ( 'message' == $severity ) {
					$messages .= '	' . $error . "<br />\n";
				} else {
					$errors .= '	' . $error . "<br />\n";
				}
			}
		}
		if ( ! empty( $errors ) ) {
			echo '<div id="login_error">' . apply_filters( 'password_protected_login_errors', $errors ) . "</div>\n";
		}
		if ( ! empty( $messages ) ) {
			echo '<p class="message">' . apply_filters( 'password_protected_login_messages', $messages ) . "</p>\n";
		}
	}
	?>

	<?php do_action( 'password_protected_before_login_form' ); ?>

	<form name="loginform" id="loginform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
		<p>
			<label for="password_protected_pass"><?php _e( 'Password', 'password-protected' ) ?><br />
			<input type="password" name="password_protected_pwd" id="password_protected_pass" class="input" value="" size="20" tabindex="20" /></label>
		</p>
		<!--
		<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90"<?php checked( ! empty( $_POST['rememberme'] ) ); ?> /> <?php esc_attr_e( 'Remember Me', 'password-protected' ); ?></label></p>
		-->
		<p class="submit">
			<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Log In', 'password-protected' ); ?>" tabindex="100" />
			<input type="hidden" name="testcookie" value="1" />
			<input type="hidden" name="password-protected" value="login" />
			<input type="hidden" name="redirect_to" value="<?php echo esc_attr( $_REQUEST['redirect_to'] ); ?>" />
		</p>
	</form>

	<?php do_action( 'password_protected_after_login_form' ); ?>

</div>

<script type="text/javascript">
try{document.getElementById('password_protected_pass').focus();}catch(e){}
if(typeof wpOnload=='function')wpOnload();
</script>

<?php do_action( 'login_footer' ); ?>

<div class="clear"></div>

</body>
</html>