<?
	include "../common.php";
	$no2=$_REQUEST['no2'];
	$no1=$_REQUEST['no1'];	
	$query="delete from opts where no38=$no2;";
	$result=mysqli_query($db,$query);
	if (!$result) exit ("에러: $query");
	
	echo("<script>location.href='opts.php?no1=$no1'</script>");
?>

