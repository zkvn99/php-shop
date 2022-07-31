
<?
	include "main_top.php";
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!---- 화면 우측(신상품) 시작 -------------------------------------------------->	
			<table width="767" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="60">
						<img src="images/main_newproduct.jpg" width="767" height="40">
					</td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0">
				<!---1번째 줄-->
				<tr>
					<td width="150" height="205" align="center" valign="top">
					<?
							include "common.php";
							$no = $_REQUEST["no"];
							
							$num_col=5;   $num_row=3;          		// column수, row수
							$query="select * from product where icon_new38=1 and status38=1 order by rand()  limit 15";
							$result=mysqli_query($db,$query); 
							if (!$result) exit("에러:$query");
							$count=mysqli_num_rows($result);         // 출력할 제품 개수
							$icount=0;                                                // 출력한 제품 개수 카운터
							echo("<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>");
							for ($ir=0; $ir<$num_row; $ir++)
								{
									echo("<tr>");
									for ($ic=0;  $ic<$num_col;  $ic++)
										{
										if ($icount < $count)
										{
											$row=mysqli_fetch_array($result);
											echo("<td align='center'> <a href=\"product_detail.html?no=109469\"><img src=\"product/0000_s.jpg\" width='120' height='140' border='0'></a> </td>");
										}
									else
										echo("<td></td>");      // 제품 없는 경우
										$icount++;
									}
									echo("</tr>");
								}
									echo("</table>");
						?>
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=1"><font color="444444">상품명1</font></a>&nbsp; 
									<img src="images/i_hit.gif" align="absmiddle" vspace="1"> <img src="images/i_new.gif" align="absmiddle" vspace="1"> 
								</td>
							</tr>
							<tr><td height="20" align="center"><b>89,000 원</b></td></tr>
						</table>
					</td>
				<!---2번째 줄-->
				<tr>
					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">상품명1</font></a>&nbsp; 
									<img src="images/i_hit.gif" align="absmiddle" vspace="1"> <img src="images/i_new.gif" align="absmiddle" 
								</td>
							</tr>
							<tr><td height="20" align="center"><b>89,000 원</b></td></tr>
						</table>
					</td>
				</tr>
				<tr><td height="10"></td></tr>
				<!---3번째 줄-->
				<tr>
					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=109469"><font color="444444">상품명1</font></a>&nbsp; 
									<img src="images/i_hit.gif" align="absmiddle" vspace="1"> <img src="images/i_new.gif" align="absmiddle" 
								</td>
							</tr>
							<tr><td height="20" align="center"><b>89,000 원</b></td></tr>
						</table>
					</td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>
