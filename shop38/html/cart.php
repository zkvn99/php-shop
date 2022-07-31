<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (20038.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-38">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>

<?
	include "common.php";
	include "main_top.php";
	$no=$_REQUEST['no'];
	$num=$_REQUEST['num'];
	$opts1=$_REQUEST['opts1'];
	$opts2=$_REQUEST['opts2'];
	$cart=$_COOKIE['cart'];
	$n_cart=$_COOKIE['n_cart'];
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function cart_edit(kind,pos) {
				if (kind=="deleteall") 
				{
					location.href = "cart_edit.php?kind=deleteall";
				} 
				else if (kind=="delete")	{
					location.href = "cart_edit.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>

			<!-- form2 시작  -->
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td height="30" align="left"><img src="images/cart_title.gif" width="746" height="30" border="0"></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710" class="cmfont">
				<tr>
					<td><img src="images/cart_title1.gif" border="0"></td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710">
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="420" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="380"  align="center">가격</td>
					<td width="90"  align="center">합계</td>
					<td width="50"  align="center">삭제</td>
				</tr>

				<form name="form2" method="post">
				<tr>
				<?
					$total=0;
					

					if (!$n_cart) $n_cart=0;
					for ($i=1;  $i<=$n_cart;  $i++)
					{
						if ($cart[$i])
					   {
						   list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
						   $query="select * from product where no38=$no";
							$result=mysqli_query($db,$query); 
							if (!$result) exit("에러:$query");
							$count=mysqli_num_rows($result);
							$row=mysqli_fetch_array($result);
							$query1 = "select * from opts where no38=$opts1";
							$result1=mysqli_query($db,$query1); 
							if (!$result1) exit("에러:$query1");
							$count1=mysqli_num_rows($result1);
							$row1=mysqli_fetch_array($result1);
							$query2 = "select * from opts where no38=$opts2";
							$result2=mysqli_query($db,$query2); 
							if (!$result2) exit("에러:$query2");
							$count2=mysqli_num_rows($result2);
							$row2=mysqli_fetch_array($result2);
							$price = number_format(round($row['price38']*(100-$row['discount38'])/100,-2));	
							$price1 =number_format($price*$num);
						   echo("
									<td height='60' align='center' bgcolor='#FFFFFF'>
									<table cellpadding='0' cellspacing='0' width='100%'>
									<tr>
								<td width='60'>
								<a href='product_detail.php?no=$row[no38]'><img src='product/$row[image1]' width='50' height='50' border='0'></a>
								</td>
								<td class='cmfont'>
									<a href='product_detail.php?no=$row[no38]'>제품명</a><br>
									<font color='#0066CC'>[옵션사항]</font> $row1[name38] $row2[name38]
								</td>
							</tr>
						</table>
					</td>
					
					<td align='center' bgcolor='#FFFFFF'>
						<input type='text' name='num$i' size='3' value='$num' class='cmfont1'>&nbsp<font color='#464646'>개</font>
					</td>
					<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price</font></td>
					<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price1</font></td>
					<td align='center' bgcolor='#FFFFFF'>
						<a href = 'javascript:cart_edit('update','$i')'><img src='images/b_edit1.gif' border='0'></a>&nbsp<br>
						<a href = 'javascript:cart_edit('delete','$i')'><img src='images/b_delete1.gif' border='0'></a>&nbsp
					</td>
				</tr>
					");
						   
						}
					}
					$total1=$total+$price1;
					if ($total < $max_baesongbi) 
						$total=$total1 + $baesongbi ;
					echo("
					<tr>
					<td colspan='5' bgcolor='#F0F0F0'>
						<table width='100%' border='0' cellpadding='0' cellspacing='0' class='cmfont'>
							<tr>
								<td bgcolor='#F0F0F0'><img src='images/cart_image1.gif' border='0'></td>
								<td align='right' bgcolor='#F0F0F0'>
									<font color='#0066CC'><b>총 합계금액</font></b> : 상품대금($total1원) + 배송료($baesongbi원) = <font color='#FF3333'><b>$total</b></font>&nbsp;&nbsp
								</td>
							</tr>
							");
					?>
				
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="44">
					<td width="710" align="center" valign="middle">
						<a href="index.html"><img src="images/b_shopping.gif" border="0"></a>&nbsp;&nbsp;
						<a href="javascript:cart_edit('deleteall',0)"><img src="images/b_cartalldel.gif" width="103" height="26" border="0"></a>&nbsp;&nbsp;
						<a href="order.html"><img src="images/b_order1.gif" border="0"></a>
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
	?>

&nbsp
</center>

</body>
</html>