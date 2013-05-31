<?php
	$path = "../".$_GET["path"]; //"characters/trainers"
	$dirs = $_GET["dirs"]; //front/back
	$folders = $_GET["folders"]; //Heroes/Friends/Rivals
	$res = Array();
	
	foreach($dirs as $dir){
		$curRes = Array();
		foreach($folders as $folder){
			if($handle = opendir($path."/".$dir."/".$folder)){ //front/trainers/Heroes/
				$numTrainers = Array();
				$curTrainers = 0;
				$gens = Array();
				$numFrames = Array();
				
				while (false !== ($entry = readdir($handle))) {
					if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
						$curTrainers++;
						
						if($_handle = opendir($path."/".$dir."/".$folder."/".$entry)){ //trainers/Heroes/1/
							$curGens = Array();
							$curFrames = Array();
							while (false !== ($_entry = readdir($_handle))) {
								if ($_entry != "." && $_entry != ".." && $_entry != ".DS_Store") {
	
									if($__handle = opendir($path."/".$dir."/".$folder."/".$entry."/".$_entry)){ //trainers/Heroes/1/rgb/
										$frameCount = 0;
										while (false !== ($__entry = readdir($__handle))) {
											if ($__entry != "." && $__entry != ".." && $__entry != ".DS_Store") {
												$frameCount++;
											}
										}
										array_push($curGens, $_entry);
										array_push($curFrames, $frameCount);
	//									array_push($numFrames, $frameCount);
										closedir($__handle);
									}
									
								}
							}
							$gens[$entry] = $curGens;
							$numFrames[$entry] = $curFrames;
							closedir($_handle);
						}
					}
				}
				array_push($numTrainers, $curTrainers);
				array_push($curRes, Array($numTrainers, $gens, $numFrames));
				closedir($handle);
			}
		}
		array_push($res, $curRes);
//		$res[$dir] = $curRes;
	}
	
	echo json_encode($res);
?>