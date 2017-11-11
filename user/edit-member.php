<?php
session_start();
if($_SESSION['se_status']  !=  'user')
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
	if($_SESSION['se_id']  !=  NULL)
	   {
			include('../config.php');
			$sql_show  	=	"select  *  from  members where member_user =  '".$_SESSION['se_id']."' ";
			$result_show  	=	mysql_query($sql_show);
			while($show  	=	mysql_fetch_assoc($result_show))
					{
?>		   
		   
  <form method="post" name="frm-add" id="frm-add" autocomplete="off" action="<?=$_SERVER['PHP_SELF'];?>">
    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" colspan="4" align="center"><h1><span class="cl-green">แก้ไขข้อมูลลูกค้า</span></h1></td>
      </tr>
      <tr>
        <td width="150" height="15">&nbsp;</td>
        <td width="10" height="15">&nbsp;</td>
        <td width="150" height="15">&nbsp;</td>
        <td width="150" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>Username</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left">          <input name="member_user" type="text" disabled="disabled" class="txt-field" id="member_user" value="<?=$show['member_user'];?>" maxlength="10" readonly>        </td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>Password</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left">          <input name="member_pass" type="password" class="txt-field" id="member_pass" value="<?=$show['member_pass'];?>" maxlength="10">        </td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>ชื่อ - นามสกุล</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left">          <input name="member_name" type="text" class="txt-field" id="member_name" value="<?=$show['member_name'];?>" size="35" maxlength="50">        </td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>เพศ</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left">
          <select name="member_sex" id="member_sex" class="txt-select">
            <option  value="" selected></option>
            <option value="ชาย" <? if($show['member_sex']  ==  'ชาย'){ echo 'selected'; }?>>ชาย</option>
            <option value="หญิง"  <? if($show['member_sex']  ==  'หญิง'){ echo 'selected'; }?>>หญิง</option>
          </select>          </td>
      </tr>
      <tr>
        <td height="40" align="right"><strong>ที่อยู่</strong></td>
        <td height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left"><textarea name="member_address" cols="37" rows="4" class="txt-area" id="member_address"><?=$show['member_address'];?></textarea>      
       </td>
      </tr>
      <tr>
        <td width="150" height="40" align="right"><strong>เบอร์โทรศัพท์</strong></td>
        <td width="10" height="40">&nbsp;</td>
        <td height="40" colspan="2" align="left">          <input name="member_tel" type="tel" class="txt-field" id="member_tel" value="<?=$show['member_tel'];?>" maxlength="10">        </td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
        <td height="15">&nbsp;</td>
      </tr>
      <tr>
        <td width="150" height="60">
        <input name="hid_user" type="hidden" id="hid_user" value="<?=$show['member_user'];?>">
        <input name="hid_pass" type="hidden" id="hid_pass" value="<?=$show['member_pass'];?>">
        <input name="hid_name" type="hidden" id="hid_name" value="<?=$show['member_name'];?>">
        <input name="hid_sex" type="hidden" id="hid_sex" value="<?=$show['member_sex'];?>">
        <input name="hid_address" type="hidden" id="hid_address" value="<?=$show['member_address'];?>">
        <input name="hid_tel" type="hidden" id="hid_tel" value="<?=$show['member_tel'];?>"></td>
        <td width="10" height="60">&nbsp;</td>
        <td width="150" height="60" align="center"><input name="submit" type="submit" class="btn" id="submit" form="frm-add" value="edit"  onClick="return  check_edit();"></td>
        <td width="150" height="60" align="center"><input type="button" name="button" id="button" value="exit" class="btn" onClick="window.location='show-member.php?link=uri_user';"></td>
      </tr>
    </table>
  </form>
<?php
					}
	   }
?> 
</div>
<?php
include('footer.php');

if($_SERVER['REQUEST_METHOD']  ==  'POST')
  {
	  include('../config.php');
	  
	  $member_pass  =  $_POST['member_pass'];
	  $member_name  =  $_POST['member_name'];
	  $member_sex  =  $_POST['member_sex'];
	  $member_address  =  $_POST['member_address'];
	  $member_tel  =  $_POST['member_tel'];
	  
	  $sql_edit  =  "update  members  set   member_pass  =  '".$member_pass."'  ,  member_name  =  '".$member_name."'  ,  member_sex  =  '".$member_sex."'  ,  member_address  =  '".$member_address."'  ,  member_tel  =  '".$member_tel."' where member_user  =  '".$_SESSION['se_id']."'   ";
	  $result_edit  =  mysql_query($sql_edit);
	  if($result_edit  == true)
		{
			echo  "<script>alert('Edit succeed full');window.location='edit-member.php';</script>";  
		}		
	mysql_close($config);
  }
?>


<script>
function  check_edit()
   {
	   
		var   data2  =  document.getElementById('member_pass');   
		var   data3  =  document.getElementById('member_name');   
		var   data4  =  document.getElementById('member_sex');   
		var   data6  =  document.getElementById('member_address');   
		var   data7  =  document.getElementById('member_tel');   
		
		var   hid2  =  document.getElementById('hid_pass');   
		var   hid3  =  document.getElementById('hid_name');   
		var   hid4  =  document.getElementById('hid_sex');    
		var   hid6  =  document.getElementById('hid_address');   
		var   hid7  =  document.getElementById('hid_tel');
		
		
		if(data2.value  ==  '')
		   {
			   alert('กรอก  password');
			   data2.focus();
			   return  false;
		   }
		else if(data2.value.length  < 4)
		   {
			   alert('กรอก  password  4 ตัวขึ้นไป');
			   data2.focus();
			   return  false;
		   }	
		else if(data3.value  ==  '')
		   {
			   alert('กรอก  ชื่อ - นามสกุล');
			   data3.focus();
			   return  false;
		   }   
		else if(data4.value  == '')
		   {
			   alert('เลือก  เพศ');
			   data4.focus();
			   return  false;
		   }   
		else if(data6.value  ==  '')
		   {
			   alert('กรอก  ที่อยู่');
			   data6.focus();
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
		else if(data2.value  == hid2.value  && data3.value  ==  hid3.value  &&  data4.value  ==  hid4.value  &&  data6.value  == hid6.value  &&  data7.value  ==  hid7.value)
		  {
			  alert('กรุณาเปลี่ยนแปลงข้อมูล');
			  data2.focus();
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