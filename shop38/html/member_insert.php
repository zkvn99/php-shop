<?
	include "common.php";
	
	$uid=$_REQUEST["uid"];
	$pwd=$_REQUEST["pwd"];
	$name=$_REQUEST["name"];
	$birthday1=$_REQUEST["birthday1"];
	$birthday2=$_REQUEST["birthday2"];
	$birthday3=$_REQUEST["birthday3"];
	$sm=$_REQUEST["sm"];
	$tel1=$_REQUEST["tel1"];
	$tel2=$_REQUEST["tel2"];
	$tel3=$_REQUEST["tel3"];
	$phone1=$_REQUEST["phone1"];
	$phone2=$_REQUEST["phone2"];
	$phone3=$_REQUEST["phone3"];
	$email=$_REQUEST["email"];
	$zip=$_REQUEST["zip"];
	$juso=$_REQUEST["juso"];
	
	$birthday=sprintf("%04d-%02d-%02d",$birthday1,$birthday2,$birthday3);
	$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
	$phone=sprintf("%-3s%-4s%-4s",$phone1,$phone2,$phone3);
	
	$query="insert into member (uid38,pwd38,name38,birthday38,sm38,tel38,phone38,email38,zip38,juso38,gubun38)
							values('$uid','$pwd','$name','$birthday',$sm,'$tel','$phone','$email','$zip','$juso',0);";
							
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	
?>
	<script>location.href="member_joinend.php"</script>
	

