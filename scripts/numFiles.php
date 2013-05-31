<?php

$path = $_GET["path"];
$folders = $_GET["folders"];
$res = "";

foreach($folders as $folder){
	if($handle = opendir($path.$folder)){
		$count = 0;
		while (false !== ($entry = readdir($handle))) {
			if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
				$count++;
			}
		}
		closedir($handle);
		$res = $res." ".$count;
	}
}

echo $res;
?>