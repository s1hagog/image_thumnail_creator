<?php 
function create_thumbnail($path, $save, $width, $height) {
	//Get image tupe and size
	$info = getimagesize($path);

	//Put data in array
	$size = array($info[0], $info[1]);

    //Depending on picture extension calling functions
	if ($info['mime'] == 'image/png') {
		$src = imagecreatefrompng($path); 
	} else if ($info['mime'] == 'image/jpeg') {
		$src = imagecreatefromjpeg($path);
	} else if ($info['mime'] == 'image/gif') {
 		$src = imagecreatefromgif($path);
	} else {
		return false;
	}//each function creates new image


	//Return identificatior of image (black pic with width and height)
	$thumb = imagecreatetruecolor($width, $height);

	//W:H ratio of original
	$src_aspect = $size[0] / $size[1];

	//W:H ratio of thumb
	$thumb_aspect = $width / $height;


	
	if($src_aspect < $thumb_aspect) { 	

		//if our original is thiner than thumb
		$scale = $width / $size[0];
		$new_size = array($width, $width / $src_aspect); 		

		$src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2); 
	
	} else if ($src_aspect > $thumb_aspect) {
		
		//if our original is wider than thumb
		$scale = $height / $size[1];
		$new_size = array($height * $src_aspect, $height);
		$src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0);
	} else {

		$new_size = array($width, $height);
		$src_pos = array(0,0);
	}

	$new_size[0] = max($new_size[0], 1);
	$new_size[1] = max($new_size[1], 1);

	//Copying and saving the image with resampling
	imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
	

	if($save === false) {
		return imagepng($thumb); //returns jpeg/png/gif pic;
	} else {
		return imagepng($thumb, $save);//saves jpeg/png/gif pic;
	}

}
