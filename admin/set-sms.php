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

   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_sms" method="post" name="frm_add" id="frm_add">
<?php
include('../config.php');
$sql_show	=	"select *  from  set_sms ";
$result_show	=	mysql_query($sql_show);
$check_rows	=	mysql_num_rows($result_show);
if($check_rows  ==  false)
  {
?>
<table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">ตั้งค่าข้อมูล sms</h2></td>
          </tr>
   	      <tr>
   	        <td width="100" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="200" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="200" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">username</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_user" type="text" class="txt-field" id="set_user" maxlength="15"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">password</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_pass" type="password" class="txt-field" id="set_pass"  maxlength="15"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">credit</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left">
            <select name="set_credit" class="txt-select" id="set_credit">
            <option value=""  selected></option>
   	          <option value="standard">Standard</option>
   	          <option value="premium">Premium</option>
            </select></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">send_name</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_name" type="text" class="txt-field" id="set_name"  maxlength="15"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">msg</td>
   	        <td width="10" height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_msg" type="text" class="txt-field" id="set_msg"  size="50" maxlength="70"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="200" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="200" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="70" align="right">&nbsp;</td>
   	        <td width="10" height="70"></td>
   	        <td width="200" height="70" align="center">&nbsp;</td>
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="Save"  class="btn"  onClick="return  check_add();"></td>
          </tr>
        </table>
<?php	  
  }
else
   {
		while($show  =  mysql_fetch_assoc($result_show))
				{
?>     
   	    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">ตั้งค่าข้อมูล sms</h2></td>
          </tr>
   	      <tr>
   	        <td width="100" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="200" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="200" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">username</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_user" type="text" class="txt-field" id="set_user" value="<?=$show['set_user']?>" maxlength="15"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">password</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_pass" type="password" class="txt-field" id="set_pass" value="<?=$show['set_pass']?>" maxlength="15"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">credit</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left">
            <select name="set_credit" class="txt-select" id="set_credit">
              <option value=""  selected></option>
   	          <option value="standard" <? if($show['set_credit']  == 'standard' ) { echo  "selected";  }?>>Standard</option>
   	          <option value="premium" <? if($show['set_credit']  == 'premium' ) { echo  "selected";  }?>>Premium</option>
            </select>
            
            </td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">send_name</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_name" type="text" class="txt-field" id="set_name" value="<?=$show['set_name']?>" maxlength="15"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="40" align="right">msg</td>
   	        <td width="10" height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="set_msg" type="text" class="txt-field" id="set_msg" value="<?=$show['set_msg']?>" size="50" maxlength="70"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="15" align="right"></td>
   	        <td width="10" height="15"></td>
   	        <td width="200" height="15" align="left"></td>
   	        <td width="150" height="15" align="left"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="1" align="right" bgcolor="#F5F5F5"></td>
   	        <td width="10" height="1" bgcolor="#F5F5F5"></td>
   	        <td width="200" height="1" align="left" bgcolor="#F5F5F5"></td>
   	        <td width="150" height="1" align="left" bgcolor="#F5F5F5"></td>
          </tr>
   	      <tr>
   	        <td width="100" height="70" align="right"><input name="hid_id" type="hidden" id="hid_id" value="<?=$show['set_id']?>"></td>
   	        <td width="10" height="70"></td>
   	        <td width="200" height="70" align="center">&nbsp;</td>
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="edit"  class="btn"  onClick="return check_add();"></td>
          </tr>
        </table>
<?php
				}
		}
	mysql_close($config);
?>        
  </form>

</div>
<?php
include('footer.php');

if($_SERVER['REQUEST_METHOD']  ==  'POST')
  {
	  include('../config.php');
	  $set_user	=	$_POST['set_user'];
	  $set_pass  =  $_POST['set_pass'];
	  $set_credit	  =  $_POST['set_credit'];
	  $set_name   =  $_POST['set_name'];
	  $set_msg  =  $_POST['set_msg'];
	  
	  $set_id  = $_POST['hid_id'];
	  if($set_id  ==  NULL)
	     {
			 $sql_add  =  "insert  into  set_sms  (set_user , set_pass , set_credit , set_name , set_msg )  values ('".$set_user."' , '".$set_pass."'  ,  '".$set_credit."'  ,  '".$set_name."'  ,  '".$set_msg."' )  ";
			 $result_add  =  mysql_query($sql_add);
			 if($result_add  ==  true)
			   {
				   echo  "<script>alert('Save  Succeed  Full');window.location='set-sms.php?uri_sms';</script>";
			   }
			  
		 }
	  else
	     {
			 $sql_edit  =  "update  set_sms  set  set_user =  '".$set_user."' , set_pass  =   '".$set_pass."'  , set_credit  =    '".$set_credit."'  , set_name  =    '".$set_name."'  , set_msg  =   '".$set_msg."'  where  set_id  =  '".$set_id."'  ";
			 $result_edit  =  mysql_query($sql_edit);
			 if($result_edit  ==  true)
			   {
				   echo  "<script>alert('Edit  Succeed  Full');window.location='set-sms.php?link=uri_sms';</script>";
			   }
		 }
	  mysql_close($config);
  }
  
?>


<script>
function  check_add()
    {
		var	check1	=	document.getElementById('set_user');
		var	check2	=	document.getElementById('set_pass');
		var	check3	=	document.getElementById('set_credit');
		var	check4	=	document.getElementById('set_name');
		var	check5	=	document.getElementById('set_msg');
		
		if(check1.value  ==  '')
		   {
				alert('กรุณากรอกข้อมูล   username');   
				check1.focus();
				return  false;
		   }
		else   if(check2.value  ==  '')
		   {
				alert('กรุณากรอกข้อมูล  password');   
				check2.focus();
				return  false;
		   }
		 else   if(check3.value  ==  '')
		   {
				alert('กรุณาเลือกข้อมูล   credit');   
				check3.focus();
				return  false;
		   }
		 else   if(check4.value  ==  '')
		   {
				alert('กรุณากรอกข้อมูล   name');   
				check4.focus();
				return  false;
		   }
		 else   if(check5.value  ==  '')
		   {
				alert('กรุณากรอกข้อมูล   msg');   
				check5.focus();
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