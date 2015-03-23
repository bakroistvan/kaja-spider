<?php
header('Access-Control-Allow-Origin: *');
 
if (isset($_GET['url']) && preg_match('`^http://`', $_GET['url'])) {

	$file_info = new finfo(FILEINFO_MIME_TYPE);
	$mime_type = $file_info->buffer(file_get_contents($_GET['url']));

	header('Content-Type: ' . $mime_type);

	echo file_get_contents($_GET['url']);
}
?>