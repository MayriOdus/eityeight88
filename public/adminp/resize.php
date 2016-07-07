<?php 

function resize($filename,$images_file,$images,$paths,$sizewant) { 
			  $img_time =  date('dmyyHis');
			
  //echo $filename;
 // echo $images_file;
 // echo $images;
  //images
			if( $images_file == "image/gif" )
			{
			$ext = ".gif";
			  $bn = basename( $filename,$ext ); 
			}
			if (($images_file=="image/jpg")||($images_file=="image/jpeg")||($images_file=="image/pjpeg"))
			{
			$ext = ".jpg";
			  $bn = basename( $filename,$ext ); 
			}
			if( $images_file =="image/png"){
				$ext = ".png";
				 $bn = basename( $filename,$ext ); 
			}
		    
			 $width=$sizewant; //600
		     $b_new_images = $img_time.$bn.$ext;
			 $new_images =  $img_time.$bn.$ext;
			 
			$new_name_images_base = $b_new_images;
			$size=GetimageSize($images);
			$height=round($width*$size[1]/$size[0]);
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
			switch ($images_file) {
				case 'image/jpeg':
				  imagejpeg($images_fin, $path, 100);
				  break;
				case 'image/png':
				  imagepng($images_fin, $path, 0);
				  break;
				case 'image/gif':
				  imagegif($images_fin, $path);
				  break;
				default:
				  exit;
				  break;
			  }
			ImageDestroy($images_orig);
			ImageDestroy($images_fin); 
			
			  $nameimages = $new_name_images_base;
			   return  $nameimages ;
		 
}
 
/*
//Maximize script execution time
ini_set('max_execution_time', 0);

//Initial settings, Just specify Source and Destination Image folder.
$ImagesDirectory    = '/home/public_html/websites/images/'; //Source Image Directory End with Slash
$DestImagesDirectory    = '/home/public_html/websites/images/new/'; //Destination Image Directory End with Slash
$NewImageWidth      = 500; //New Width of Image
$NewImageHeight     = 500; // New Height of Image
$Quality        = 80; //Image Quality

//Open Source Image directory, loop through each Image and resize it.
if($dir = opendir($ImagesDirectory)){
    while(($file = readdir($dir))!== false){

        $imagePath = $ImagesDirectory.$file;
        $destPath = $DestImagesDirectory.$file;
        $checkValidImage = @getimagesize($imagePath);

        if(file_exists($imagePath) && $checkValidImage) //Continue only if 2 given parameters are true
        {
            //Image looks valid, resize.
            if(resizeImage($imagePath,$destPath,$NewImageWidth,$NewImageHeight,$Quality))
            {
                echo $file.' resize Success!<br />';
                // Now Image is resized, may be save information in database?
               

            }else{
                echo $file.' resize Failed!<br />';
            }
        }
    }
    closedir($dir);
}

//Function that resizes image.
function resizeImage($SrcImage,$DestImage, $MaxWidth,$MaxHeight,$Quality)
{
    list($iWidth,$iHeight,$type)    = getimagesize($SrcImage);
    $ImageScale             = min($MaxWidth/$iWidth, $MaxHeight/$iHeight);
    $NewWidth               = ceil($ImageScale*$iWidth);
    $NewHeight              = ceil($ImageScale*$iHeight);
    $NewCanves              = imagecreatetruecolor($NewWidth, $NewHeight);

    switch(strtolower(image_type_to_mime_type($type)))
    {
        case 'image/jpeg':
        case 'image/png':
        case 'image/gif':
            $NewImage = imagecreatefromjpeg($SrcImage);
            break;
        default:
            return false;
    }

    // Resize Image
    if(imagecopyresampled($NewCanves, $NewImage,0, 0, 0, 0, $NewWidth, $NewHeight, $iWidth, $iHeight))
    {
        // copy file
        if(imagejpeg($NewCanves,$DestImage,$Quality))
        {
            imagedestroy($NewCanves);
            return true;
        }
    }
}
*/
?>