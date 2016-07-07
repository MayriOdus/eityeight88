<?php 
include('conn.php');
	$idd = $_POST['id']; 		  
	echo $upSQL ="SELECT * FROM upload_data WHERE id ='$idd' ";
	$QueryP = mysqli_query($connect, $upSQL);	  
	// ID 	file_name 	post_id 	times
	 $path = "images/upload/";
	 while($objP = mysqli_fetch_array($QueryP)){
		   $pphoto = $objP["file_name"];
		  unlink($path.$pphoto); //delete it
		}
	 
		$dqlp="DELETE FROM  upload_data  WHERE id ='$idd'";
		$delQueryp  = mysqli_query($connect, $dqlp);
		 echo "<script>setTimeout('Redirect(".$ns.")', 2000);</script>";  
	 
?>