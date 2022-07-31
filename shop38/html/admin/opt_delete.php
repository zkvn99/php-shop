<?
	include "../common.php";
	$no=$_REQUEST["no"];

	$query="delete from opt where no=$no;";
	$result=mysqli_query($db,$query);
	if (!$result) exit ("에러: $query");
	
	echo("<script>location.href='opt.php'</script>");
?>

