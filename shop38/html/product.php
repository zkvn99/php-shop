<?
	include "main_top.php";
	include "common.php";
	$no=$_REQUEST['no'];
	$num_col=$_REQUEST['num_col'];
	$num_row=$_REQUEST['num_row'];
	$menu=$_REQUEST['menu'];
	$sort=$_REQUEST['sort'];
	$page=$_REQUEST['page'];
	
	

if ($sort=="up")
		$query="select * from product where menu38=$menu order by price38 desc;";
		elseif ($sort=="down")
		$query="select * from product where menu38=$menu order by price38;";
		elseif ($sort=="name")
		$query="select * from product where menu38=$menu order by name38;";
		else
		$query="select * from product where menu38=$menu order by no38 desc;";	
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $query");  
	$count=mysqli_num_rows($result); 
	if ($count != 0)
	

	$page=$_REQUEST["page"];
	if(!$page) $page=1;
	$pages=ceil($count/$page_line);
	
	$first=1;
	if($count>0) $first=$page_line*($page-1);
	
	$page_last=$count - $first;
	if($page_last>$page_line)$page_last=$page_line;
	if($count>0)mysqli_data_seek($result,$first);

	
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

      <!-- 하위 상품목록 -->

			<!-- form2 시작 -->
			<form name="form2" method="post" action="product.php">
			<input type="hidden" name="menu" value="1">

			<table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#efefef">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
										<?
											$i=$menu;
											echo("<font color='#C83762' class='cmfont'><b>$a_menu[$i] &nbsp</b></font>&nbsp");
										?>
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="100">

															<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>
												
																<option value="new" <? if($sort == 'new') echo("selected") ?>>신상품순 정렬</option>
																<option value="up"  <? if($sort == 'up') echo("selected") ?>>고가격순 정렬</option>
																<option value="down" <? if($sort == 'down') echo("selected") ?>>저가격순 정렬</option>
																<option value="name" <? if($sort == 'name') echo("selected") ?>>상품명 정렬</option>
																
															</select>
														
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 -->

			<table border="0" cellpadding="0" cellspacing="0">
				<!--- 1 번째 줄 -->
				<?
				$num_col=5;   $num_row=3; 
				$page_line=$num_cul*$num_row;
								// column수, row수
				      // 출력할 제품 개수
				$icount=0;                                                // 출력한 제품 개수 카운터
				echo("<table>");
				for ($ir=0; $ir<$num_row; $ir++)
				{
			echo("<tr>");
				for ($ic=0;  $ic<$num_col;  $ic++)
			{
				if ($icount < $page_last)
				{
						$row=mysqli_fetch_array($result);
						$price = $row['price38'];
						$price = number_format($price);
						$discount = $row['discount38'];
						$sale = $row['price38'];
						$sale = round($sale*(100-$discount)/100,-3);
						$sale = number_format($sale);
						echo("<td width='150' height='205' align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
							<tr> 
								<td align='center'> 
									<a href='product_detail.php?no=$row[no38]'><img src='product/$row[image1]' width='120' height='140' border='0'></a>
								</td>
							</tr>
							<tr><td height='5'></td></tr>
							<tr> 
								<td height='20' align='center'>
									<a href='product_detail.php?no=$row[no38]'><font color='444444'>$row[name38]</font></a>&nbsp; ");
									if($row['icon_new38'])echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'> ");
									if($row['icon_hit38'])echo("<img src='images/i_hit.gif' align='absmiddle' vspace='2'> ");
									if($row['icon_sale38'])echo("<img src='images/i_sale.gif' align='absmiddle' vspace='3'> ");
								if($row['discount38']==0)
									echo("<font color='red'></font></td></tr>");
								else
									echo("<font color='red'>$row[discount38]%</font></td></tr>");
							if($row['discount38']==0)
								echo("<tr> <td height='20' align='center'><b>$price 원</b></td></tr></table></td>");
							else
								echo("<tr> <td height='20' align='center'><strike>$row[price38]</strike><br><b>$sale 원</b></td></tr></table></td>");
				}
				else
					echo("<td></td>");      // 제품 없는 경우
				$icount++;
				}
				echo("</tr>");
				}		
					echo("</table>");

				?>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<center>
					<?
$blocks = ceil($pages/$page_block);
$block = ceil($page/$page_block);
$page_s = $page_block * ($block-1);
$page_e = $page_block * $block; 
if ($blocks<=$block) $page_e= $pages;

if($block>1)
	{
		$tmp=$page_s; 
			echo("<a href='product.php?page=$tmp&sel1=$sel1&sel2=$sel2&sel3=$sel3&
       sel4=$sel4&text1=$text1'>
				<img src='images/i_prev.gif' align='absmiddle' border='0'></a>&nbsp");
}
for($i=$page_s+1; $i<=$page_e; $i++)
{
	if ($page == $i)
		echo("<font color='red'><b>$i</b></font>$nbsp");
	else
		echo("<a href='product.php?page=$i&sel1=$sel1&sel2=$sel2&sel3=$sel3&
       sel4=$sel4&text1=$text1'>[$i]</a>&nbsp");
}
if($block<$blocks){
	$tmp=$page_e+1;
		echo("&nbsp<a href='product.php?page=$tmp&sel1=$sel1&sel2=$sel2&sel3=$sel3&
       sel4=$sel4&text1=$text1'>
		<img src='images/i_next.gif' align='absmiddle' border='0'></a>");
}
?>
					</center>
				</tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>
