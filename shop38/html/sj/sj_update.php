
<?
	include "common.php";
	
	$no=$_REQUEST["no"];
	$name=$_REQUEST["name"];
	$kor=$_REQUEST["kor"];
	$eng=$_REQUEST["eng"];
	$mat=$_REQUEST["mat"];
	$hap=$_REQUEST["hap"];
	$avg=$_REQUEST["avg"];

	$query="update sj set name38='$name', kor38=$kor, eng38=$eng, mat38=$mat,
			hap38=$hap,avg38=$avg where no38=$no;";
	$result=mysqli_query($db,$query);
	if (!$result) exit ("에러: $query");

	echo("<script>location.href='sj_list.php'</script>");
?>