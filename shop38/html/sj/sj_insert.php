<?
	include "common.php";

	$name=$_REQUEST["name"];
	$kor=$_REQUEST["kor"];
	$eng=$_REQUEST["eng"];
	$mat=$_REQUEST["mat"];
	$hap=$_REQUEST["hap"];
	$avg=$_REQUEST["avg"];

	$query="insert into sj(name38,kor38,eng38,mat38,hap38,avg38)
				values('$name',$kor,$eng,$mat,$hap,$avg);";
	
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");

	echo("<script>location.href='sj_list.php'</script>");
	
	
	
?>