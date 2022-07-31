<?
include   "../common.php";
$no	=$_REQUEST['no'];

	$query = "select * from jumun where no38=$no;";
	$result=mysqli_query($db,$query);
  if (!$result) exit("에러:$query");
 $count=mysqli_num_rows($result);
 $row=mysqli_fetch_array($result);

	if($row['state38']==1) $state = "주문신청";
	if($row['state38']==2) $state = "주문확인";
	if($row['state38']==3) $state = "입금확인";
	if($row['state38']==4) $state = "배송중";
	if($row['state38']==5) $state = "주문완료";
	if($row['state38']==6) $state = "주문취소";

	if($row['member_no38']==0)
	$member_no="비회원";
	else 
	$member_no="회원";

	$o_tel1=trim(substr($row['o_tel38'],0,3));
	$o_tel2=trim(substr($row['o_tel38'],3,4));
	$o_tel3=trim(substr($row['o_tel38'],7,4));
	$row['o_tel38'] = $o_tel1 . "-" . $o_tel2 . "-" . $o_tel3;	
	
	$o_phone1=trim(substr($row['o_phone38'],0,3));
	$o_phone2=trim(substr($row['o_phone38'],3,4));
	$o_phone3=trim(substr($row['o_phone38'],7,4));
	$row['o_phone38'] = $o_phone1 . "-" . $o_phone2 . "-" . $o_phone3;

	$r_tel1=trim(substr($row['r_tel38'],0,3));
	$r_tel2=trim(substr($row['r_tel38'],3,4));
	$r_tel3=trim(substr($row['r_tel38'],7,4));
	$row['o_tel38'] = $r_tel1 . "-" . $r_tel2 . "-" . $r_tel3;	
	
	$r_phone1=trim(substr($row['r_phone38'],0,3));
	$r_phone2=trim(substr($row['r_phone38'],3,4));
	$r_phone3=trim(substr($row['r_phone38'],7,4));
	$row['r_phone38'] = $o_phone1 . "-" . $r_phone2 . "-" . $r_phone3;
	if($row['pay_method38']==0)
	$pay_method="카드";
	else 
	$pay_method="무통장";
	if($row['card_halbu38']==0)
	$card_halbu="일시불";
	else 
	$card_halbu=$row['card_halbu38']."개월";
	switch($row['card_kind38']){
		case 1:$card_kind="국민카드";break;
		case 2:$card_kind="신한카드";break;
		case 3:$card_kind="우리카드";break;
		case 4:$card_kind="하나카드";break;
	}
	switch($row['bank_kind38']){
		case 1: $bank_kind="국민은행 000-00000-0000";break;
		case 2: $bank_kind="신한은행 000-00000-0000";break;
	}
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

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$no?> (<font color="blue"><?=$state?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['jumunday38']?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['o_name38']?> (<?=$member_no?>)</td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['o_tel38']?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['o_email38']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['o_phone38']?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row['o_zip38']?>) <?=$row['o_juso38']?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['r_name38']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['r_tel38']?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['r_email38']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$row['r_phone38']?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row['r_zip38']?>) <?=$row['r_juso38']?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="380" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row['memo38']?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">지불종류</font></td>
        <td width="380" height="20" bgcolor="#EEEEEE"><?=$pay_method?></td>
<?
		if(!$row['pay_method38']){
		echo("
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드승인번호 </font></td>
			<td width='380' height='20' bgcolor='#EEEEEE'>$row[card_okno38]&nbsp</td>
		</tr>
		<tr> 
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드 할부</font></td>
			<td width='380' height='20' bgcolor='#EEEEEE'>$card_halbu</td>
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드종류</font></td>
			<td width='380' height='20' bgcolor='#EEEEEE'>$card_kind</td>
		</tr>");}
		else
			{
		echo("
		<tr> 
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>무통장</font></td>
			<td width='380' height='20' bgcolor='#EEEEEE'>$bank_kind</td>
			<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>입금자이름</font></td>
			<td width='380' height='20' bgcolor='#EEEEEE'>$row[bank_sender38]</td>
		</tr>");
		}
?>

</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>
<?
		$totalcash=0;
		$query=" select product.name38, jumuns.num38, jumuns.price38, jumuns.cash38,jumuns.discount38, opts1.name38 as opts1_name, opts2.name38 as opts2_name
		from ((jumuns left join product on jumuns.product_no38=product.no38) 
		left join opts as opts1 on jumuns.opts_no138=opts1.no38) 
		left join opts as opts2 on jumuns.opts_no238=opts2.no38 where jumuns.jumun_no38='$no';";
		 $result=mysqli_query($db,$query);
		 if (!$result) exit("에러:$query");
		 $count=mysqli_num_rows($result);
		 for ($i=0; $i<$count; $i++){   
		  $row=mysqli_fetch_array($result);
		  if($row[0]==null) $row[0]="배송비";
		   if($row[4]==0) $row[4]=null;
		   $totalcash=$totalcash+$row[3];
		   $totalcash1=number_format($totalcash);
		  $row[2]=number_format($row[2]);
		  $row[3]=number_format($row[3]);
	echo("
	<tr bgcolor='#EEEEEE' height='20'>	
			<td width='340' height='20' align='left'>$row[0]</td>	
			<td width='50'  height='20' align='center'>$row[1]</td>	
			<td width='70'  height='20' align='right'>$row[2]</td>	
			<td width='70'  height='20' align='right'>$row[3]</td>	
			<td width='50'  height='20' align='center'>$row[4]</td>	
			<td width='60'  height='20' align='center'>$row[5]</td>	
			<td width='60'  height='20' align='center'>$row[6]</td>	
		</tr>");
		 }
	?>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$totalcash1?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>