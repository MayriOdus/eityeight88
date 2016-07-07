<?php 
session_start();
	ob_start();
	include('conn.php');
 $ns = $_SESSION["member_ns"] 
?>

<script type="text/javascript">
<!--
function Redirect()
{
    window.location="backoffice-adm-car.php";
}
</script>
<?php  
   
		$idd = $_GET['id']; 
		$strSQL ="SELECT * FROM ucar WHERE id =$idd"; 
		$objQuery  = mysqli_query($connect, $strSQL);		
		while($info = mysqli_fetch_array($objQuery)){	
  
			$idc = $info ['id'];
			$ibrand= $info ['brand'];		 
			$ipost= $info ['id_post'];			 
			$iuser= $info ['id_users'];
		  
	$upSQL ="SELECT * FROM upload_data WHERE use_id ='$iuser'and brand_car = '$ibrand' and post_id='$ipost'";
	$QueryP = mysqli_query($connect, $upSQL);
	$count_pic = mysqli_num_rows($QueryP);
		echo $count_pic;
	// ID 	file_name 	post_id 	times
	 $path = "images/upload/";
		while($objP = mysqli_fetch_array($QueryP)){
		  $pphoto = $objP["file_name"];
		echo unlink($path.$pphoto); //delete it
		}
		$dqlp="DELETE FROM  upload_data  WHERE use_id ='$iuser'and brand_car = '$ibrand' and post_id='$ipost'";
		$delQueryp  = mysqli_query($connect, $dqlp);		   
	 
	  
	 
}
		 $dql="DELETE FROM ucar WHERE id =$idd";
		  $delQuery  = mysqli_query($connect, $dql);		   
	 echo "<script>setTimeout('Redirect()', 2000);</script>";  
	 
?>