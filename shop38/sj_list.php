<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	


<html>
<head>
	<title>성적처리 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="400" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">이름</td>
    <td width="50"  align="center">국어</td>
    <td width="50"  align="center">영어</td>
    <td width="50"  align="center">수학</td>
    <td width="50"  align="center">총점</td>
    <td width="50"  align="center">평균</td>
  </tr>
<?
	$query="select * from sj order by name38";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	$count=mysqli_num_rows($result);

	for($i=0;$i<$count;$i++)
	{
		$row=mysqli_fetch_array($result);
		$avg=sprintf("%6.1f",$row["avg38"]);
		echo("<tr bgcolor='lightyellow'>
				<td width='100'>$row[name38]</td>
				<td width='100'>$row[kor38]</td>
				<td width='100'>$row[eng38]</td>
				<td width='100'>$row[mat38]</td>
				<td width='100'>$row[hap38]</td>
				<td width='100'>$avg</td>
			</tr>");
	}
?>

</table>

</body>
</html>
