<?
	include "../common.php";
	
	$no=$_REQUEST["no"];
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
	$gubun=$_REQUEST["gubun"];
	

	$birthday=sprintf("%04d-%02d-%02d","$birthday1","$birthday2","$birthday3");
	$tel=sprintf("%-3s%-4s%-4s","$tel1","$tel2","$tel3");
	$phone=sprintf("%-3s%-4s%-4s","$phone1","$phone2","$phone3");

	
	$query="update member set pwd38='$pwd',name38='$name',birthday38='$birthday',sm38=$sm
				,tel38='$tel',phone38='$phone', email38='$email', zip38='$zip', juso38='$juso',gubun38='$gubun' where no38 = $no;";
	$result=mysqli_query($db,$query);
	if (!$result) exit ("에러: $query");

	
	echo("<script>location.href='member.php'</script>");
?>

