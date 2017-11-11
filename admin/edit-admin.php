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
	$admin_user  =	$_GET['say_user'];
	if($admin_user  !=  NULL)
	   {
			include('../config.php');
			$sql_show	=	"select * from admins where  admin_user  =  '".$admin_user."' ";
			$result_show	=	mysql_query($sql_show);
			while($show		=	mysql_fetch_assoc($result_show))
					{
	 ?>
   	  <form action="<?=$_SERVER['PHP_SELF'];?>?link=uri_admin" method="post" name="frm_edit" id="frm_edit">
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
   	        <td height="40" align="right">Username</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="admin_user" type="text" disabled="disabled" class="txt-field" id="admin_user" value="<?=$show['admin_user'];?>" size="15" maxlength="10" readonly></td>
          </tr>
   	      <tr>
   	        <td height="40" align="right">Password</td>
   	        <td height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="admin_pass" type="password" class="txt-field" id="admin_pass" value="<?=$show['admin_pass'];?>" size="15" maxlength="10"></td>
          </tr>
   	      <tr>
   	        <td width="150" height="40" align="right">ชื่อ - นามสกุล</td>
   	        <td width="10" height="40"></td>
   	        <td height="40" colspan="2" align="left"><input name="admin_name" type="text" class="txt-field" id="admin_name" value="<?=$show['admin_name'];?>" size="40" maxlength="50"></td>
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
            <input name="hid_user" type="hidden" id="hid_user" value="<?=$show['admin_user'];?>">
            <input name="hid_pass" type="hidden" id="hid_pass" value="<?=$show['admin_pass'];?>">   	          
            <input name="hid_name" type="hidden" id="hid_name" value="<?=$show['admin_name'];?>"></td>
   	        <td width="10" height="70"></td>
   	        <td width="150" height="70" align="center"><input type="submit" name="submit" id="submit" value="edit"  class="btn" onClick="return check_edit();"></td>
   	        <td width="150" height="70" align="center"><input type="button" name="button" id="button" value="exit" class="btn" onClick="window.location='show-admin.php?link=uri_admin';"></td>
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
		$admin_user   =   $_POST['hid_user'];
		$admin_pass  = $_POST['admin_pass'];
		$admin_name  =  $_POST['admin_name'];
		
		
		$sql_edit  =  "update  admins  set  admin_pass = '".$admin_pass."'  ,  admin_name  =  '".$admin_name."'  where  admin_user  =  '".$admin_user."'  ";
		$result_edit  =   mysql_query($sql_edit);
		if($result_edit  ==  true)
		  {
				echo  "<script>alert('edit succeed full');window.location='edit-admin.php?link=uri_admin&say_user=".$admin_user."';</script>";
		  }
		mysql_close($config);
   }

include('footer.php');
?>

<script type="text/javascript">
function  check_edit()
   {
	   
		var	check2	=	document.getElementById('admin_pass');	
		var	check3	=	document.getElementById('admin_name');	
		
		var	hid2	=	document.getElementById('hid_pass');	
		var	hid3	=	document.getElementById('hid_name');	
		
		if(check2.value   ==  '')
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
		else if(check2.value  ==  hid2.value  && check3.value  ==  hid3.value)
		   {
			   alert('กรุณาเปลี่ยนแปลงข้อมูล');
				check2.focus()
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