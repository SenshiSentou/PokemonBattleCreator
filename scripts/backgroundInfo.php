<?php
	$path = "../".$_GET["path"]; //"environment/backgrounds"
	$res = Array(); //all backgrounds
	
	if($handle = opendir($path)){
		while (false !== ($entry = readdir($handle))){
			if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
				$backgrounds = Array(); //all bgs in this folder ('0' e.g.)
				if($_handle = opendir($path."/".$entry)){
					while (false !== ($_entry = readdir($_handle))){
						if ($_entry != "." && $_entry != ".." && $_entry != ".DS_Store") {
							array_push($backgrounds, $_entry);
						}
					}
				}
//				array_push($res, $backgrounds);
				$res[$entry] = $backgrounds;
			}
		}
		closedir($handle);
	}
	
	echo json_encode($res);
?>