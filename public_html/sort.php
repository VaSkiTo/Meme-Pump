<?php

	$imageArray = scandir("adminuploads");
	$remove = array(".","..");
	$images = array_diff($imageArray,$remove);
	$dir = "./adminuploads/";
	
	$count = 0;
	foreach($images as $x){
		rename($dir . $x, $dir . (string)$count++ . ".png");
	}

?>