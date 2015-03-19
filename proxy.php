<?php
header('Access-Control-Allow-Origin: *');
 
if (isset($_GET['url']) && preg_match('`^http://`', $_GET['url'])) {
	
	if (substr(strrchr($_GET['url'],'.'),1)) {
		header('Content-Type: image/jpeg');
	}
	echo file_get_contents($_GET['url']);
}
?>