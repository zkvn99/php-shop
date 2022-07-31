
<?
	include "common.php";
	$uid=$_REQUEST['uid'];
	$pwd=$_REQUEST['pwd'];
	
	$query="select no38, name38 from member where uid38='$uid' and pwd38='$pwd'";

	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	
	$no=$row["no38"];
	$name=$row["name38"];
	
	if ($count>0) {
		setcookie("cookie_no",$no);
		setcookie("cookie_name",$name);
		echo("<script>location.href='index.html'</script>");
	}
	else
		echo("<script>location.href='member_login.php'</script>");
?>