<?
	include "../common.php";
	$no=$_REQUEST["no"];
	$menu=$_REQUEST["menu"];
	$code=$_REQUEST["code"];
	$name=$_REQUEST["name"];
	$name = addslashes($name);
	$coname=$_REQUEST["coname"];
	$price=$_REQUEST["price"];
	$opt1=$_REQUEST["opt1"];
	$opt2=$_REQUEST["opt2"];
	$contents=$_REQUEST["contents"];
	$contents=addslashes($contents);
	$status=$_REQUEST["status"];
	$discount=$_REQUEST["discount"];
	$icon_new=$_REQUEST["icon_new"];
	$icon_hit=$_REQUEST["icon_hit"];
	$icon_sale=$_REQUEST["icon_sale"];
	$regday1=$_REQUEST["regday1"];
	$regday2=$_REQUEST["regday2"];
	$regday3=$_REQUEST["regday3"];
	
	$imagename1=$_REQUEST["imagename1"];
	$imagename2=$_REQUEST["imagename2"];
	$imagename3=$_REQUEST["imagename3"];
	
	$checkno1=$_REQUEST["checkno1"];
	$checkno2=$_REQUEST["checkno2"];
	$checkno3=$_REQUEST["checkno3"];
	
	$fname1=$imagename1;
	if ($checkno1=="1") $fname1="";    // 삭제 체크가 된 경우
	if ($_FILES["image1"]["error"]==0) 
	{
		$fname1=$_FILES["image1"]["name"];    
			if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
					"../product/" . $fname1)) exit("업로드 실패");
	}

	$fname2=$imagename2;
	if ($checkno2=="1") $fname2="";    // 삭제 체크가 된 경우
	if ($_FILES["image2"]["error"]==0) 
	{
		$fname2=$_FILES["image2"]["name"];    
			if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
				"../product/" . $fname2)) exit("업로드 실패");
	}

	$fname3=$imagename3;
	if ($checkno3=="1") $fname3="";    // 삭제 체크가 된 경우
	if ($_FILES["image3"]["error"]==0) 
	{
		$fname3=$_FILES["image3"]["name"];    
			if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
				"../product/" . $fname3)) exit("업로드 실패");
	}
	
	if (!$icon_new) $icon_new=0; else $icon_new=1; 
    if (!$icon_hit) $icon_hit=0; else $icon_hit=1;
    if (!$icon_sale) $icon_sale=0; else $icon_sale=1;
	
	$regday=sprintf("%04d-%02d-%02d",$regday1,$regday2,$regday3);
	
	$query="update product set menu38='$menu',code38='$code',name38='$name',coname38='$coname',price38='$price',opt1='$opt1',opt2='$opt2',content38='$contents',status38='$status',regday38='$regday',icon_new38='$icon_new',
	icon_hit38='$icon_hit',icon_sale38='$icon_sale',discount38='$discount',image1='$fname1',image2='$fname2',image3='$fname3' where no38 = $no;";
	$result=mysqli_query($db,$query);
	if (!$result) exit ("에러: $query");

	
	echo("<script>location.href='product.php'</script>");
?>

