<?php
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  'C:/wamp/www/NGO_local/uploads/home_images/'. $_FILES['Filedata']['name'];

	move_uploaded_file($tempFile,$targetFile);

?>