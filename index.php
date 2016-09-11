<?php 

/*пппп|ппппп|пппппппп|ппп|ппп||ппп|ппп|пппппппп|пппппп|пппп*\
|###########################################|
|#_____________________..ButsagsCMS.._____________________#|
|#______.Copyright й2000-2016 Chris Ingis. All Rights Reserved._____#|
|###########################################|
\*____|_____|________|___|___||___|___|________|______|____*/


# Begin Session
session_start();

# Disable Notices
error_reporting(E_ALL ^ E_NOTICE);

# Begin GZip Compression
if(extension_loaded('zlib')){
	ini_set('zlib.output_compression_level', 1);  
	ob_start('ob_gzhandler'); 
}

# Is ButsagsCMS installed?
if(!file_exists('install/butsags.lock')){
	header("Location: install/install.php");
	exit;
} else {
	# Stable Version Number
	define("ButsagsCMS_VERSION", "0.0.1");

	# Import Database Driver
	require_once("config/database.php");

	# Import Essential Files
	require_once("config/properties.php");
	require_once("config/functions.php");

	# Define $getbutsags variable
	$getbutsags = isset($_GET['butsags']) ? $_GET['butsags'] : "";

	switch($getbutsags){
		case NULL:
			header('Location: ?butsags=main');
			break;
		case "main":
			include($styledir."/header.php");
			include("includes/public/main.php");
			include($styledir."/footer.php");
			break;
		case "ucp":
			include($styledir."/header.php");
			include("includes/ucp/main.php");
			include($styledir."/footer.php");
			break;
		case "admin":
			include($styledir."/header.php");
			include("includes/admin/main.php");
			include($styledir."/footer.php");
			break;
		case "gmcp":
			include($styledir."/header.php");
			include("includes/gmcp/main.php");
			include($styledir."/footer.php");
			break;
		case "bbs":
			include($styledir."/header.php");
			include("includes/bbs/main.php");
			include($styledir."/footer.php");
			break;
		case "misc":
			include("includes/misc/main.php");
			break;
		case "style":
			include($styledir."/header.php");
			include("includes/public/styles.php");
			include($styledir."/footer.php");
			break;
		case "cursor":
			include($styledir."/header.php");
			include("includes/public/cursors.php");
			include($styledir."/footer.php");
			break;
		case "butsagsdl":
			include("includes/misc/phpdownload.php");
			break;
		default:
			include($styledir."/header.php");
			include("includes/public/main.php");
			include($styledir."/footer.php");
			break;
		case "info":
			include($styledir."/header.php");
			include("includes/public/info.php");
			include($styledir."/footer.php");
			break;

	}
}

$mysqli->close();
?>