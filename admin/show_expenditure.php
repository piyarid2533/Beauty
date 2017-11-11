<? 
session_start();
include ("../connect/connect.php");
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบบริหารจัดการหอพัก</title>
<link href="../css/style_net.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
if($_GET['del']){
$sql=mysql_query("delete from expenditure where id_ep='$_GET[del]' ");
	echo"<META HTTP-EQUIV=Refresh CONTENT=\"1; URL=index.php?file=show_expenditure.php\">";
	}
if($_POST['type']=="รายรับ"){
	$q="select * from expenditure where type_ep='รายรับ'";
}else if($_POST['type']=="รายจ่าย"){
	$q="select * from expenditure where type_ep='รายจ่าย'";
}else{
	$q="select * from expenditure where type_ep like '%%'";
	$hide_total=1;//ซ่อนรวมเงินทั้ง
}
if($_POST['date_expenditure']!=""){
	$q.=" and date_ep like '".$_POST['date_expenditure']."%'";
}

$sql=mysql_query($q); 
?>
<table width="663"  summary="Employee Pay Sheet"  class="form-2" id="frmMain">
<thead><tr bgcolor="#CCCCCC">
  <th colspan="7" align="center" class="Text-Comment23" scope="col">
<form action="" method="post">
<table width="100%" border="0">
  <tr bgcolor="#CCCCCC">
    <td width="11%">ค้นหา :</td>
    <td width="20%">
    <select name="type">
      <option>--เลือกรายการ--</option>
      <option value="รายรับ">รายรับ</option>
      <option value="รายจ่าย">รายจ่าย</option>
    </select></td>
    <td width="15%" align="right">ระยะเวลา :</td>
    <td width="32%"><input type="month" name="date_expenditure" /></td>
    <td width="22%"><input type="submit" value="ค้นหา" />&nbsp;</td>
  </tr>
</table>
</form>
</th></tr>
</thead>
  <thead>
    <tr bgcolor="#CCCCCC">
      <th colspan="7" align="center" class="Text-Comment29" scope="col"><span class="Text-Comment8">ข้อมูลสรุปรายรับรายจ่าย</span>        <hr/></th>
    </tr>
  </thead>
  <? if($_POST[type]!=""){?>
  <tbody>
    <tr bgcolor="#FF66FF">
      <td width="8%" align="center">ลำดับ</td>
      <td width="11%" align="center"> ประเภท</td>
      <td align="center">รายการ</td>
      <td align="center">วันที่ </td>
      <td align="center">ทำรายการโดย</td>
      <td align="center">จำนวนเงิน</td>
      <td align="center">&nbsp;</td>
    </tr>
    <? 
	$no=1;                                                       //เริ่มต้นรายการ
	$total=0;
	while($rs=mysql_fetch_array($sql)){
		?>

    <tr bgcolor="#FF66FF">
      <td align="center"><?=$no++;?>&nbsp;</td>
      <td width="11%"align="center"><?=$rs[type_ep];?></td>
      <td width="17%" align="center"><?=$rs[details_ep];?></td>
      <td width="27%" align="center"><? $date=$rs[date_ep]; include('../date.php');?></td>
      <td width="17%" align="center"><?=$rs[posted_ep];?>&nbsp;</td>
      <td width="14%" align="center"><?=number_format($rs[amount_ep],2,'.',',');?></td>
      <td width="6%" align="center"><a href="?file=show_expenditure.php&del=<?=$rs[id_ep];?>">ลบ</a></td>
    </tr>
    <? $total+=$rs[amount_ep]; ?>
    <? } ?>
     <?
	$num=mysql_num_rows($sql);
	if($num==0 ){
	?>
    <tr bgcolor="#FF66FF">
      <td colspan="7" align="center">--ไม่มีรายการ--
     </td>
    </tr>
    <? }else if($hide_total!=1){	?>
    <tr bgcolor="#FF66FF">
      <td colspan="7" align="right">
	  <?php
	  	echo "รวมเงินทั้งหมด : ". number_format($total,2,'.',','); 
	}
		?>  บาท</td>
    </tr>
   
  </tbody>
  <? }?>
</table>
</body>
</html>