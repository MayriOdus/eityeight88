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
    window.location="proflie-user.php?nse=" + id;
}
</script>
<?php  
 $pid  =   $_POST["id"];
	$cok = $_COOKIE['authorization'];
	$timepost =  date('d-M-y h.i.s');
	$cr ="SELECT * FROM compare WHERE id_car='$pid' and cokie='$cok'";
		$idd=$_GET['id'];
		 
		  $dqlsql="DELETE FROM $table_name WHERE id = $idd";
		  $delQuery  = mysqli_query($connect, $dqlsql);
		   
		 echo "<script>setTimeout('Redirect(".$ns.")', 2000);</script>";  
		  mysqli_close($connect);
?>