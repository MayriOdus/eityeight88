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
    window.location="backoffice-adm.php";
}
</script>
<?php  
   
		$idd = $_GET['id']; 
		$strSQL ="SELECT code_product,post_id,timep FROM product WHERE id =$idd"; 
		$objQuery  = mysqli_query($connect, $strSQL);		
		while($info = mysqli_fetch_array($objQuery)){  
		  $i1 = $info['code_product'];		 
		   $id_post = $info['post_id'];
			$timep = $info['timep'];
		  
	  $upSQL ="SELECT * FROM upload_data WHERE post_id ='$id_post' and prod_id ='$i1'";
	$QueryP = mysqli_query($connect, $upSQL);
	$count_pic = mysqli_num_rows($QueryP);
	 $path = "../images/upload/";
	//	echo $count_pic;
	// ID 	file_name 	post_id 	times
	
		while($obj = mysqli_fetch_array($QueryP)){
	   $pphoto = $obj["file_name"];
	  $path.$pphoto;
	  unlink($path.$pphoto); //delete it
		}
		$dqlp="DELETE FROM  upload_data  WHERE post_id ='$id_post' and prod_id ='$i1'";
		 $delQueryp  = mysqli_query($connect, $dqlp);		   
 
	 
}
		  $dql="DELETE FROM product WHERE id =$idd";
		  $delQuery  = mysqli_query($connect, $dql);		   
		 echo "<script>setTimeout('Redirect()', 2000);</script>";  
		 echo "<div align='center' style='padding-top:10%; '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
	 
?>