<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('ขออภัยคุณไม่มีสิทธิ์เข้าใช้งาน');window.location='../index.php';</script>";  
  }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../design.css">
</head>

<body>
<?php
include('bar-top.php');
?>
<div class="con-login">
  <form method="post" name="frm-add" id="frm-add" autocomplete="off" action="<?=$_SERVER['PHP_SELF'];?>">
    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" colspan="4" align="center"><h1><span class="cl-green">เพิ่มข้อมูลพนักงาน</span></h1></td>
      </tr>
      <tr>
        <td width="150" height="15">&nbsp;</td>
        <td width="10" height="15">&nbsp;</td>
        <td width="150" height="15">&nbsp;</td>
        <td width="150" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>ชื่อ - นามสกุล</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><strong>
          <input name="psn_name" type="text" class="txt-field" id="psn_name" size="35" maxlength="50">
        </strong></td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>เบอร์โทรศัพท์</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><strong>
          <input name="psn_tel" type="tel" class="txt-field" id="psn_tel" maxlength="10">
        </strong></td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
      </tr>
      <tr>
        <td width="150" height="60">&nbsp;</td>
        <td width="10" height="60">&nbsp;</td>
        <td width="150" height="60" align="center"><input name="submit" type="submit" class="btn" id="submit" form="frm-add" value="Save"  onClick="return  check_psn();"></td>
        <td width="150" height="60" align="center"><input name="reset" type="reset" class="btn" id="reset" form="frm-add" value="Reset"></td>
      </tr>
    </table>
  </form>
</div>
<?php
include('footer.php');

if($_SERVER['REQUEST_METHOD']  ==  'POST')
  {
	  include('../config.php');
	 
	  $psn_name  =  $_POST['psn_name'];
	  $psn_tel  =  $_POST['psn_tel'];
	  
	  $sql_check_psn  =  "select psn_name  from  personnels where  psn_name  =  '".$psn_name."'  ";
	  $result_check_psn  = mysql_query($sql_check_psn);
	  $row_check_psn  = mysql_num_rows($result_check_psn);
	  if($row_check_psn  ==  true)
	    {
			echo  "<script>alert('ขออภัย  ชื่อ - นามสกุล  พนักงานนี้มีในระบบแล้ว');history.back();</script>";
		}
	 else
	    {
			$sql_psn  =  "insert into  personnels (psn_name  ,  psn_tel)  values  ( '".$psn_name."'  ,  '".$psn_tel."' )  ";
			$result_psn  =  mysql_query($sql_psn);
			if($result_psn  == true)
			  {
				  echo  "<script>alert('Save succeed full');window.location='add-personnel.php?link=uri_psn';</script>";  
			  }
		}
		
	mysql_close($config);
  }
?>


<script>
function  check_psn()
   {
	   
		var   data3  =  document.getElementById('psn_name');   
		var   data7  =  document.getElementById('psn_tel');   
		
		
		if(data3.value  ==  '')
		   {
			   alert('กรอก  ชื่อ - นามสกุล');
			   data3.focus();
			   return  false;
		   }   
		else if(data7.value  ==  '')
		   {
			   alert('กรอก  เบอร์โทรศัพท์');
			   data7.focus();
			   return  false;
		   }
		else if(data7.value.length  !=  10)
		   {
			   alert('กรอก  เบอร์โทรศัพท์ให้ถูกต้อง');
			   data7.focus();
			   return  false;
		   }	
	    else if(isNaN(data7.value))
		   {
			   alert('กรอก  เบอร์โทรศัพท์  เป็นตัวเลข');
			   data7.value  =  '';
			   data7.focus();
			   return  false;
		   }
		else
		   {
			   return  true;   
		   }
   }
</script>
</body>
</html>