<?
	include "../common.php";
	$no1=$_REQUEST["no1"];
	$no2=$_REQUEST["no2"];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>
<?
	$query = "select * from opts where no38 = $no2;";
	$result=mysqli_query($db,$query);
	if (!$result) exit ("에러: $query");
	$row=mysqli_fetch_array($result);	
?>
<form name="form1" method="post" action="opts_update.php">

<input type="hidden" name="no1" value="<?=$no1;?>">
<input type="hidden" name="no2" value="<?=$no2;?>">

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
		<td width="100" height="20" bgcolor="#CCCCCC" align="center">
			<font color="#142712">소옵션번호</font>
		</td>
		<td width='400' height='20'  bgcolor='#F2F2F2'><?=$no2;?></td>
	</tr>
	<tr> 
		<td width="100" height="20" bgcolor="#CCCCCC" align="center">
			<font color="#142712">소옵션명</font>
		</td>
		<td width="400" height="20"  bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row['name38'];?>" size="20" maxlength="20">
		</td>
	</tr>
</table>
<br>
<table width="500" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="submit" value="수 정 하 기"> &nbsp;&nbsp
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
