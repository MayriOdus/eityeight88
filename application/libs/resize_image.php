<?php

function resize($filename,$images_file,$images,$paths,$sizewant) 
{ 
	$img_time = date('dmyyHis');
	if( $images_file == "image/gif" )
	{
		$ext = ".gif";
		$bn = basename( $filename,$ext ); 
	}

	if ( ( ($images_file == "image/jpg") || ($images_file=="image/jpeg") || $images_file=="image/pjpeg") )
	{
		$ext = ".jpg";
		$bn = basename( $filename,$ext ); 
	}

	if( $images_file == "image/png")
	{
		$ext = ".png";
		$bn = basename( $filename,$ext ); 
	}

	$width = $sizewant; //600
	$b_new_images = $bn.$ext;
	$new_images =  $bn.$ext;

	$new_name_images_base = $b_new_images;
	$size = GetimageSize($images);
	$height = round($width * $size[1] / $size[0]);
	if( $images_file == "image/gif" )
	{
		$images_orig = ImageCreateFromGIF($images);
		//cut to same line
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin,$images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		//cut to same line
	}

	if (($images_file=="image/jpg")||($images_file=="image/jpeg")||($images_file=="image/pjpeg"))
	{
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin,$images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	}

	if( $images_file == "image/png" ) 
	{
		$images_orig = imagecreatefrompng($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = imagecreatetruecolor($width,$height);
		imagealphablending($images_fin, false);
		imagesavealpha($images_fin,true);
		$transparent = imagecolorallocatealpha($images_fin, 255, 255, 255, 127);
		imagefilledrectangle($images_fin, 0, 0, $width, $height, $transparent);
		imagecopyresampled($images_fin, $images_orig , 0, 0, 0, 0, $width+1,$height+1,$photoX,$photoY);
	}

	$path = $paths.$new_images;
	switch ($images_file) 
	{
		case 'image/jpeg': imagejpeg($images_fin, $path, 100); break;
		case 'image/png': imagepng($images_fin, $path, 0); break;
		case 'image/gif': imagegif($images_fin, $path); break;
		default: exit;
	}
	
	ImageDestroy($images_orig);
	ImageDestroy($images_fin); 

	$nameimages = $new_name_images_base;

	return  $nameimages ;
}


?>