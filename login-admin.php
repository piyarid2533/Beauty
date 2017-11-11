<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
<?php
include('bar-top.php');
?>
<div class="con-login">
  <form method="post" name="frm-login" id="frm-login" autocomplete="off" action="<?=$_SERVER['PHP_SELF'];?>?link=admin">
    <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="140" height="64" align="right"><img src="img/icon-key.png" width="128" height="128"  alt=""/></td>
        <td width="10" height="64">&nbsp;</td>
        <td height="64" colspan="3" align="left" valign="bottom"><h1>Sign in for <span class="cl-green">Admin</span></h1></td>
      </tr>
      <tr>
        <td width="140" height="10" align="right">&nbsp;</td>
        <td width="10" height="10">&nbsp;</td>
        <td width="100">&nbsp;</td>
        <td width="100" height="10">&nbsp;</td>
        <td width="100" height="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" align="right"><strong>Username</strong></td>
        <td height="40" align="left">&nbsp;</td>
        <td height="40" colspan="2" align="center"><input name="username" type="text" class="txt-field" id="username" placeholder="กรอกข้อมูล" maxlength="10"></td>
        <td width="100" rowspan="2" align="left" valign="bottom"><input type="submit" class="btn" name="submit" id="submit" value="Login"></td>
      </tr>
      <tr>
        <td height="40" align="right"><strong>Password</strong></td>
        <td height="40" align="left">&nbsp;</td>
        <td height="40" colspan="2" align="center"><input name="password" type="password" class="txt-field" id="password" placeholder="กรอกข้อมูล" maxlength="10"></td>
      </tr>
    </table>
  </form>
</div>
<?php
include('footer.php');
?>

<?php
if($_SERVER['REQUEST_METHOD']  == 'POST')
  {
		include('config.php');
		$user	=	mysql_escape_string($_POST['username']);  
		$pass	=	mysql_escape_string($_POST['password']);  
		
		$sql_login	=	"SELECT admin_user , admin_pass , admin_name , admin_status  
							FROM admins  
							WHERE admin_user = '".$user."'  AND  admin_pass = '".$pass."' ";
		$result_login = mysql_query($sql_login);
		$check_rows  = mysql_num_rows($result_login);
		if($check_rows  ==  false)
		  {
			  echo "<script>alert('รหัสไม่ถูกต้องกรุณากรอกใหม่');history.back();</script>";
		  }
		else
		  {
			  while($show_admin = mysql_fetch_assoc($result_login))
			  		{
						$id_user  =  $show_admin['admin_user'];
						$id_name  =  $show_admin['admin_name']; 
						$id_status  =   $show_admin['admin_status'];
					}
			  $_SESSION['se_id']	=	$id_user;
			  $_SESSION['se_name']	=	$id_name;
			  $_SESSION['se_status']	=	$id_status;

			  session_write_close();//หยุดการสร้างsession

						
			  echo "<script>alert('ยินดีตอนรับเข้าสู่ระบบ');window.location='admin/index-admin.php';</script>";
		  }
		
		mysql_close($config);
  }

?>


<script>
function  check_login()
	{
		var	user	=	document.getElementById('username');
		var	pass	=	document.getElementById('password');
		
		if(user.value  ==  '')
			{
				alert('กรอกชื่อผู้ใช้งาน');
				user.focus();
				return  false;
			}
		else  if(pass.value  ==  '')
			{
				alert('กรอกรหัสผ่าน');
				pass.focus();
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