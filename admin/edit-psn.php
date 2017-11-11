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
    <?php
	$psn_id  =	$_GET['say_id'];
	if($psn_id  !=  NULL)
	   {
			include('../config.php');
			$sql_show	=	"select * from personnels where  psn_id  =  '".$psn_id."' ";
			$result_show	=	mysql_query($sql_show);
			while($show		=	mysql_fetch_assoc($result_show))
					{
	 ?>
   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_psn" method="post" name="frm_edit" id="frm_edit">
   	    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">แก้ไขข้อมูลผู้ดูแลระบบ</h2></td>
          </tr>
   	      <tr>
   	        <td width="150" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="150" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right"><strong>ชื่อ - นามสกุล</strong></td>
   	        <td height="40">&nbsp;</td>
   	        <td height="40" colspan="2" align="left"><strong>
   	          <input name="psn_name" type="text" class="txt-field" id="psn_name" value="<?=$show['psn_name'];?>" size="35" maxlength="50">
 	          </strong></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right"><strong>เบอร์โทรศัพท์</strong></td>
   	        <td height="40">&nbsp;</td>
   	        <td height="40" colspan="2" align="left"><strong>
   	          <input name="psn_tel" type="tel" class="txt-field" id="psn_tel" value="<?=$show['psn_tel'];?>" maxlength="10">
 	          </strong></td>
          </tr>
   	      <tr>
   	        <td width="150" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="150" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="70" align="right">
            <input name="hid_id" type="hidden" id="hid_id" value="<?=$show['psn_id'];?>">
            <input name="hid_name" type="hidden" id="hid_name" value="<?=$show['psn_name'];?>">
            <input name="hid_tel" type="hidden" id="hid_tel" value="<?=$show['psn_tel'];?>"></td>
   	        <td width="10" height="70"></td>
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="edit"  class="btn" onClick="return  check_psn();"></td>
   	        <td width="150" height="70" align="center"><input type="button" name="button" id="button" value="exit" class="btn" onClick="window.location='show-psn.php?link=uri_psn';"></td>
          </tr>
        </table>
  	  </form>
      <?php
					}
	   }
	  ?>
    </div>

<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST')
   {
	   include('../config.php');
		$psn_id   =   $_POST['hid_id'];
		
		$psn_name  =  $_POST['psn_name'];
		$psn_tel  = $_POST['psn_tel'];
		
		
		$sql_edit  =  "update  personnels  set  psn_name  =  '".$psn_name."' , psn_tel  = '".$psn_tel."'   where  psn_id  =  '".$psn_id."'  ";
		$result_edit  =   mysql_query($sql_edit);
		if($result_edit  ==  true)
		  {
				echo  "<script>alert('edit succeed full');window.location='edit-psn.php?link=uri_psn&say_id=".$psn_id."';</script>";
		  }
		mysql_close($config);
   }

include('footer.php');
?>

<script>
function  check_psn()
   {
	   
		var   data3  =  document.getElementById('psn_name');   
		var   data7  =  document.getElementById('psn_tel');   
		
		var   hid3  =  document.getElementById('hid_name');   
		var   hid7  =  document.getElementById('hid_tel');  
		
		
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
		 else if(data3.value  ==  hid3.value  &&  data7.value  ==  hid7.value)
		   {
			   alert('กรุณาเปลี่ยนแปลงข้อมูล');
				data3.focus()
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