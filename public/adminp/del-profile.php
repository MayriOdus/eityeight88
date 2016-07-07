<?php 
	session_start();
	ob_start();
	include('conn.php');
	?>
<script type="text/javascript">
<!--
function Redirect(id)
{
   window.location="proflie-user.php?nse=" + id;
}
</script>
<?php   
	 
		 $idd=$_GET['id'];
		 $upda = "UPDATE ucar SET visible = '0' WHERE id = $idd";
		mysqli_query($connect, $upda);
		/*  $selsql = "select * from plac WHERE id = $idd";
		$objQuery  = mysqli_query($connect, $selsql);
		while($objResult = mysqli_fetch_array($objQuery))
			{	
				echo $i = $objResult["id"];
				echo $n_place = $objResult["name_place"];
				echo  $pphoto = $objResult['photoname1'];
				$pphoto2 = $objResult['photoname2'];
				$pphoto3 = $objResult['photoname3'];
				$pphoto4 = $objResult['photoname4'];
				$detail = $objResult['detail'];
			}
		  $dqlsql="DELETE FROM $table_name WHERE id = $idd";
		  $delQuery  = mysqli_query($connect, $dqlsql);
		    $filename = $pphoto;
		  $path = "../images/place/";
		if( $pphoto  != null ){
		  unlink($path.$pphoto); //delete it
		}
		if( $pphoto2  != null ){
		  unlink($path.$pphoto); //delete it
		}
		if( $pphoto3  != null ){
		  unlink($path.$pphoto); //delete it
		}
		if( $pphoto4  != null ){
		  unlink($path.$pphoto); //delete it
		}
		 /* echo "<script>window.history.back();";
		//  echo "window.opener.location.reload();";
		  echo "</script>";*/
		 
	 
		echo "<script>setTimeout('Redirect(".$_SESSION["member_ns"].")', 2000);</script>";  
		 // mysqli_close($connect);
?>