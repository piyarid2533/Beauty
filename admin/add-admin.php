<?php
session_start();
if($_SESSION['se_status']  !=  'admin')
  {
	  echo  "<script>alert('รหัสไม่ถูกต้องกรุณากรอกใหม่');window.location='../index.php';</script>";  
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
   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_admin" method="post" name="frm_add" id="frm_add">
   	    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
   	      <tr>
   	        <td height="50" colspan="4" align="center"><h2 class="cl-green">เพิ่มข้อมูลผู้ดูแลระบบ</h2></td>
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
   	        <td height="40" align="right">Username</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="admin_user" type="text" class="txt-field" id="admin_user" size="20" maxlength="10"></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right">Password</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="admin_pass" type="password" class="txt-field" id="admin_pass" size="15" maxlength="10"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="40" align="right">ชื่อ - นามสกุล</td>
   	        <td width="10" height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="admin_name" type="text" class="txt-field" id="admin_name" size="40" maxlength="50"></td>
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
   	        <td width="150" height="70" align="right"></td>
   	        <td width="10" height="70"></td>
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="Save"  class="btn" onClick="return check_add();"></td>
   	        <td width="150" height="70" align="center"><input type="reset" name="reset" id="reset" value="Reset"  class="btn"></td>
          </tr>
        </table>
  	  </form>
    </div>

<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST')
   {
	   include('../config.php');
		$admin_user   =   $_POST['admin_user'];
		$admin_pass  = $_POST['admin_pass'];
		$admin_name  =  $_POST['admin_name'];
		
		
		$sql_check  =  "select  admin_user  from  admins  where  admin_user  =  '".$admin_user."'  ";  
		$result_check  =  mysql_query($sql_check);
		$check_rows = mysql_num_rows($result_check);
		if($check_rows  ==  true)
		   {
			   echo "<script>alert('รหัสไม่ถูกต้องกรุณากรอกใหม่');history.back();</script>";
		   }
		else
		   {
			   $sql_add  =  "insert into  admins  (admin_user , admin_pass , admin_name , admin_status) values ( '".$admin_user."'  ,  '".$admin_pass."'  , '".$admin_name."'  , 'admin' )  ";
			   $result_add  =   mysql_query($sql_add);
			   if($result_add  ==  true)
			     {
					 echo  "<script>alert('save succeed full');window.location='add-admin.php?link=uri_admin';</script>";
				 }
		   }
		mysql_close($config);
   }

include('footer.php');
?>

<script type="text/javascript">
function  check_add()
   {
		var	check1	=	document.getElementById('admin_user');	
		var	check2	=	document.getElementById('admin_pass');	
		var	check3	=	document.getElementById('admin_name');	
		
		if(check1.value   ==  '')
			{
				alert('กรอกข้อมูล  Username');
				check1.focus()
				return  false;
			}
		else  if(check1.value.length  < 4 )
			{
				alert('กรอกข้อมูล  Username  อย่างน้อย 4 อักษร');
				check1.focus()
				return  false;
			}
		else if(check2.value   ==  '')
			{
				alert('กรอกข้อมูล  Password');
				check2.focus()
				return  false;
			}
		else  if(check2.value.length  < 4 )
			{
				alert('กรอกข้อมูล  Password  อย่างน้อย 4 อักษร');
				check2.focus()
				return  false;
			}
		else if(check3.value == '')
			{
				alert('กรอกข้อมูล  ชื่อ - นามสกุล');
				check3.focus()
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