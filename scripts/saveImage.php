<?php
	$img = $_POST['path'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	
	$filename="PBS.png";
	header("Content-disposition: attachment;filename=$filename");
	file_put_contents($filename, $data);
	readfile($filename);
	
//	echo $filename;
?>
