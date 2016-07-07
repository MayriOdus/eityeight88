<?php 
session_start();
ob_start();
include('conn.php');

$ns = $_SESSION["member_ns"] 
?>

<script type="text/javascript">
<!--
function Redirect(id)
{
    window.location="backoffice-adm.php";
}
function Redirect_news(id)
{
    if(id=="1"){
	window.location="backoffice-adm-news.php";
	}else if(id=="2"){
	window.location="backoffice-adm-gallery.php";	
	}else if(id=="3"){
	window.location="backoffice-adm-review.php";	
	}
}
</script>
<?php  
   
		$idd = $_GET['id'];
		$table_name = $_GET['table'];
		$condit = $_GET['condi'];
		if(isset($_GET['path'])){
		 $path = $_GET['path'];		 	  
		   unlink($path); //delete it			 
		}
		if($table_name=="content_news"){
			$type =  $_GET['t'];
			/*$imgsql=mysqli_query($connect, "SELECT * FROM upload_data_news WHERE  post_id ='$idd'");
			while($imgq = mysqli_fetch_array($imgsql)){
				$imgnews = $imgq['file_name'];
			}
			/*if(!empty($imgnews)){
			$path = "images/upload/".$imgnews;
			unlink($path);
			}*/
			$dqlsql="DELETE FROM  $table_name  WHERE id_post = $idd";
		    $delQuery  = mysqli_query($connect, $dqlsql);		   
			 echo "<script>setTimeout('Redirect_news(".$type.")', 2000);</script>";  
			 echo "<div align='center' style='padding-top:10%; '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
			mysqli_close($connect);
		}else{ 
		  
		
		// echo $cons;
		  $dqlsql="DELETE FROM  $table_name  WHERE $condit = $idd";
		    $delQuery  = mysqli_query($connect, $dqlsql);		   
		  echo "<script>setTimeout('Redirect(".$ns.")', 2000);</script>";  
		  echo "<div align='center' style='padding-top:10%; '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
		  mysqli_close($connect);
		}
?>