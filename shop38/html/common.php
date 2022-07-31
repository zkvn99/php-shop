<?
	$db= mysqli_connect("localhost", "shop38","1234","shop38");
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    ini_set("display_errors",1);

    mysqli_report(MYSQLI_REPORT_OFF);
	if(!$db) exit("DB연결에러");

	$page_line =5;
	$page_block=5;
	$admin_id = "admin";
	$admin_pw = "1234";
	
	$a_idname=array("전체","이름","ID");
	$n_idname=count($a_idname);
	$a_menu=array("분류선택","22SS","21FW","Outwear","Top","Bottom","Accessories","Selected Brand");
	$n_menu=count($a_menu);
	$a_state=array("전체","주문신청","주문확인","입금확인", "배송중", "주문완료",
                          "주문취소");
	$n_state=count($a_state);
	$a_jumun=array("전체","주문번호","고객명","상품명");
	$n_jumun=count($a_jumun);

?>  